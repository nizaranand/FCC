<?php

class Envato_ThisThemeUpdate
{
	protected $username;
	protected $apiKey;

	public function __construct($username, $apiKey, $authors)
	{
		// to debug
		// set_site_transient('update_themes',null);

		$this->username = $username;
		$this->apiKey = $apiKey;
		$this->authors = $authors;

		add_filter("pre_set_site_transient_update_themes", array(&$this, "check"));
	}

	public function check($updates)
	{
		$this->username = apply_filters("themoholics_theme_update_username", $this->username);
		$this->apiKey = apply_filters("themoholics_theme_update_apiKey", $this->apiKey);
		$this->authors = apply_filters("themoholics_theme_update_authors", $this->authors);

		if ($this->authors && !is_array($this->authors))
		{
			$this->authors = array($this->authors);
		}

		if (!$this->username || !$this->apiKey || !isset($updates->checked))
			return $updates;

		$api = & new Envato_Protected_API($this->username, $this->apiKey);

		add_filter("http_request_args", array(&$this, "http_timeout"), 10, 1);

		$purchased = $api->wp_list_themes(true);
		$installed = function_exists("wp_get_themes") ? wp_get_themes() : get_themes();
		$filtered = array();


		foreach ($installed as $theme)
		{
			if ($this->authors && !in_array($theme->{'Author Name'}, $this->authors))
				continue;
			$filtered[$theme->Name] = $theme;
		}

		if (!isset($purchased['api_error']) || (isset($purchased['api_error']) && strlen($purchased['api_error']) == 0 ))
		{
			foreach ($purchased as $theme)
			{
				if (isset($filtered[$theme->theme_name]))
				{
					// gotcha, compare version now
					$current = $filtered[$theme->theme_name];
					if (version_compare($current->Version, $theme->version, '<'))
					{
						// bingo, inject the update
						if ($url = $api->wp_download($theme->item_id))
						{
							$update = array(
								"url" => "http://themeforest.net/item/theme/{$theme->item_id}",
								"new_version" => $theme->version,
								"package" => $url
							);

							$updates->response[$current->Stylesheet] = $update;
						}
					}
				}
			}
		}

		remove_filter("http_request_args", array(&$this, "http_timeout"));

		return $updates;
	}

	public function http_timeout($req)
	{
		// increase timeout for api request
		$req["timeout"] = 300;
		return $req;
	}

	public static function init($username = null, $apiKey = null, $authors = null)
	{
		new Envato_ThisThemeUpdate($username, $apiKey, $authors);
	}

}

?>