
<?php
header ("Content-Type:text/xml");



 $url_array = resolve('url_array');

    

    $subdomain = resolve('subdomain');

   
?>

@inject('data','App\DataManager')
<?php
$data_values = $data->getData($subdomain);
$country = $data_values["country"];
$cities = $data_values["cities"];
$ga = $data_values["ga"];
$currency = $data_values["currency"];
$imagelocation_str = "ff";//$country;//.", ".implode(", ", $cities);

?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

@if($data_array)

@php



function getSitemapBlock($url,$imxml,$ts=null)
	{
		if($ts==null)
			$ts = date('c',time());

		

		$xmlblock='<url><loc>'.($url).'</loc><lastmod>'.$ts.'</lastmod>'.$imxml.'</url>';

   		return $xmlblock;
	}


	function getImageBlock($imgurl,$img_title,$img_caption,$country)
	{
      
      $imagelocation_str = $country;
        
		$img_xmlblock='<image:image><image:loc>'.$imgurl.'</image:loc><image:title><![CDATA['.htmlentities($img_title).']]></image:title><image:caption><![CDATA['.htmlentities($img_caption).']]></image:caption><image:geo_location>'.$imagelocation_str.'</image:geo_location>
</image:image>';
		

		return trim($img_xmlblock);
	}

		foreach($data_array as $arraydata)
		{



			//echo($brands_arraydata["brand"]);
			$url="";
			$imxml="";
			if($id=="brands")
				$url = $domain."/brand/".htmlentities($data->create_slug($arraydata["brand"]));
			elseif($id=="categories")
				$url = $domain."/category/".$arraydata["slug"];	
			elseif($id=="applications")
				$url = $domain."/application/".$arraydata["slug"];	
			elseif($id=="products")
			{
				$prodslug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $arraydata["name"])));

				$url=$domain."/product/".$arraydata["prod_id"]."/".$prodslug;
                
                $img_country = $country.", ".implode(",", $cities);
				$imxml=getImageBlock($domain."/assets/".htmlentities($arraydata["thumb_img_new_path"]),$arraydata["name"]."|
					".$country,$arraydata["seo_title"]."|".implode( ", ", $cities ),$img_country);
				

			}


			$sitemap=getSitemapBlock($url,$imxml);
			echo(trim($sitemap));

			
		}
	

@endphp
@endif

</urlset>