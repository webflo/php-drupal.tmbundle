/**
 * Return code that emits an XML icon.
 */
function theme_xml_icon(\$url) {
  if (\$image = theme('image', 'misc/xml.png', t('XML feed'), t('XML feed'))) {
    return '<a href="'. check_url(\$url) .'" class="xml-icon">'. \$image. '</a>';
  }
}

$1