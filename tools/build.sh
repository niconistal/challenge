ROUTE="../src/Gone/FrontEndBundle/Resources/public/js/templates/*.handlebars"
OUTPUT="../src/Gone/FrontEndBundle/Resources/public/js/templates/compiled/templates.js"
TFOLDER="../src/Gone/FrontEndBundle/Resources/public/js/templates/compiled/"

if [ ! -d "$TFOLDER" ]; then
  mkdir $TFOLDER
fi

node node_modules/handlebars/bin/handlebars $ROUTE -f $OUTPUT 
