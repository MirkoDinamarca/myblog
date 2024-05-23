<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>MyBlog</title>

</head>
<body class="container mx-auto my-5">
    <header>
       <nav class="flex gap-3">
            <article class="flex-1 p-5" style="border-bottom: 1px solid black">
                <h4 class="text-xl"><b>My</b>Blog</h4>
            </article>
            <article class="flex-1 p-5 flex justify-end" style="border-bottom: 1px solid black">
                Blog
            </article>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer class="fixed container bottom-0">
        <nav class="flex gap-3">
            <article class="flex-1 p-5" style="border-top: 1px solid black">
                <h4 class="text-xl"><b>My</b>Blog</h4>
                <p>Copyright 2024 - Todos los derechos reservados</p>
            </article>
            <article class="flex-1 p-5 flex justify-evenly gap-3" style="border-top: 1px solid black">
                <div class="flex gap-3">
                    <div class="w-7 h-7 bg-gray-400 rounded-md"></div>
                    <div class="w-7 h-7 bg-gray-400 rounded-md"></div>
                    <div class="w-7 h-7 bg-gray-400 rounded-md"></div>
                </div>
                <div class="flex gap-10">
                    <p>Blog</p>
                    <p>About us</p>
                    <p>Get in touch</p>
                </div>
            </article>
        </nav>
    </footer>
</body>
</html>
