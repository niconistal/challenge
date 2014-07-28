ROUTE="../src/Gone/FrontEndBundle/Resources/public/js/templates/*.handlebars"
OUTPUT="../src/Gone/FrontEndBundle/Resources/public/js/templates/compiled/templates.js"

node node_modules/handlebars/bin/handlebars $ROUTE -f $OUTPUT 
