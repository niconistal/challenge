<html>
	<head>
		{% block stylesheets%}
			<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
		{% endblock %}
	</head>
    <body>
        <div id="main">Loading...</div>
        {% block javascripts %}
            <script src="{{ asset('js/lib/jquery-min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/lib/bootstrap-min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/lib/underscore-min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/lib/backbone-min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        {% endblock %}
    </body>
</html>