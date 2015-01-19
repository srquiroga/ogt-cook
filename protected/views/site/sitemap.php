<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";?>


<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc><?php echo yii::app()->createAbsoluteUrl('site/index')?></loc>
  <changefreq>monthly</changefreq>
</url>
<url>
  <loc><?php echo yii::app()->createAbsoluteUrl("user/create") ?></loc>
  <changefreq>monthly</changefreq>
</url>

<url>
  <loc><?php echo yii::app()->createAbsoluteUrl("site/contact") ?></loc>
  <changefreq>monthly</changefreq>
</url>
    
<url>
  <loc><?php echo yii::app()->createAbsoluteUrl("user/index") ?></loc>
  <changefreq>monthly</changefreq>
</url>
<url>
  <loc><?php echo yii::app()->createAbsoluteUrl("site/login") ?></loc>
  <changefreq>monthly</changefreq>
</url>    


</urlset>