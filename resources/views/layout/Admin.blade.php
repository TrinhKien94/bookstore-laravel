<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Home Bookstore</title>
        <meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
        <meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
        <link rel="stylesheet" href="{{ url() }}/css/templatemo_style.css" type="text/css"/>
    </head>

    <body>
        <div id="templatemo_container">
            
            @include('layout.header2')

            <div id="templatemo_content">
                
                

                <div id="templatemo_content_right">
                    
                    @yield('content')

                </div>
            </div>
            
            @include('layout.footer')
            
        </div>
    </body>
</html>
