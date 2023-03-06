<?php
/* @var $this yii\web\View */

$this->title = 'Api Documentation';
?>

<div id="swagger-ui"></div>

<?php
$baseUrl = Yii::$app->urlManager->baseUrl;
$js = <<<JS
var baseUrl = "{$baseUrl}";
    // Begin Swagger UI call region
      const ui = SwaggerUIBundle({
        url: baseUrl + "/site/docs",
        dom_id: '#swagger-ui',
        deepLinking: true,
        presets: [
          SwaggerUIBundle.presets.apis,
          SwaggerUIStandalonePreset
        ],
        plugins: [
          SwaggerUIBundle.plugins.DownloadUrl
        ],
        layout: "StandaloneLayout"
      })
      // End Swagger UI call region

      window.ui = ui
JS;
$this->registerJs($js, \yii\web\View::POS_END);
