<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новая заявка на обратный звонок</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f6f9;
            padding: 20px 0;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        .email-header {
            background-color: #4f46e5; /* Индиго/Синий цвет */
            padding: 24px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            font-size: 20px;
            margin: 0;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .email-body {
            padding: 30px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .data-table td {
            padding: 12px;
            border-bottom: 1px solid #edf2f7;
            font-size: 15px;
        }
        .data-table td.label {
            font-weight: bold;
            color: #4a5568;
            width: 30%;
        }
        .data-table td.value {
            color: #1a202c;
        }
        .email-footer {
            background-color: #f8fafc;
            padding: 15px 30px;
            text-align: center;
            font-size: 12px;
            color: #718096;
            border-top: 1px solid #edf2f7;
        }
    </style>
</head>
<body>
<div class="email-wrapper">
    <div class="email-content">

        <!-- Шапка письма -->
        <div class="email-header">
            <h1>Новая заявка с сайта "my-website"</h1>
        </div>

        <!-- Тело письма -->
        <div class="email-body">
            <p>Здравствуйте! На сайте my-website была заполнена форма обратной связи. Вот данные для связи:</p>

            <table class="data-table">
                <!-- Проверяем имя, если оно передается из формы -->
                @if(isset($formData['name']))
                    <tr>
                        <td class="label">Имя:</td>
                        <td class="value">{{ $formData['name'] }}</td>
                    </tr>
                @endif

                <tr>
                    <td class="label">Телефон:</td>
                    <td class="value">
                        <!-- Делаем телефон кликабельным для мобильных -->
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $formData['phone']) }}" style="color: #4f46e5; text-decoration: none; font-weight: bold;">
                            {{ $formData['phone'] }}
                        </a>
                    </td>
                </tr>
                @if(isset($formData['email']))
                <tr>
                    <td class="label">Почта:</td>
                    <td class="value">
                        <!-- Делаем телефон кликабельным для мобильных -->
                        <a href="mailto:{{ $formData['email'] }}" style="color: #4f46e5; text-decoration: none; font-weight: bold;">
                            {{ $formData['email'] }}
                        </a>
                    </td>
                </tr>
                @endif

                <!-- Проверяем сообщение, если оно есть -->
                @if(isset($formData['comment']))
                    <tr>
                        <td class="label">Сообщение:</td>
                        <td class="value">{{ $formData['comment'] }}</td>
                    </tr>
                @endif
            </table>

            <p style="margin-bottom: 0;">Пожалуйста, свяжитесь с клиентом в ближайшее время.</p>
        </div>

        <!-- Подвал письма -->
        <div class="email-footer">
            Это автоматическое уведомление. Отвечать на него не нужно.<br>
            дата {{ now()->format('H:i:s d.m.Y') }}
        </div>

    </div>
</div>
</body>
</html>
