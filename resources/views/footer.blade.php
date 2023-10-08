<style>
    /* Стиль для прилипающего подвала */
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    main {
        flex-grow: 1;
    }

    footer {
        background-color: #f8f9fa;
        /* Цвет подвала */
        padding: 20px;
        /* Отступы для подвала */
        text-align: center;
        /* Выравнивание текста в подвале */
        position: sticky;
        bottom: 0;
    }
</style>
<html>

<body>
    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary">Powered by Zhebra</span>
        </div>
    </footer>
</body>

</html>
