<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une réservation</title>

    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            background-color: #f0f0f0; 
        }
        .card {
            overflow: hidden;
            position: relative;
            text-align: left;
            border-radius: 0.5rem;
            max-width: 290px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            background-color: #fff;
            margin: auto; 
        }

        .dismiss {
            position: absolute;
            right: 10px;
            top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            background-color: #fff;
            color: black;
            border: 2px solid #D1D5DB;
            font-size: 1rem;
            font-weight: 300;
            width: 30px;
            height: 30px;
            border-radius: 7px;
            transition: .3s ease;
        }

        .dismiss:hover {
            background-color: #ee0d0d;
            border: 2px solid #ee0d0d;
            color: #fff;
        }

        .header {
            padding: 1.25rem 1rem 1rem 1rem;
        }

        .image {
            display: flex;
            margin-left: auto;
            margin-right: auto;
            background-color:rgb(253, 228, 228);
            flex-shrink: 0;
            justify-content: center;
            align-items: center;
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            animation: animate .6s linear alternate-reverse infinite;
            transition: .6s ease;
        }

        .image svg {
            color: #ee0d0d;
            width: 2rem;
            height: 2rem;
        }

        .content {
            margin-top: 0.75rem;
            text-align: center;
        }

        .title {
            color: #ee0d0d;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
        }

        .message {
            margin-top: 0.5rem;
            color: #595b5f;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .actions {
            margin: 0.75rem 1rem;
        }

        .delete {
            cursor: pointer;
            display: inline-flex;
            padding: 0.5rem 1rem;
            background-color: #ee0d0d;
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            justify-content: center;
            width: 100%;
            border-radius: 0.375rem;
            border: none;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .abandonner {
            cursor: pointer;
            display: inline-flex;
            margin-top: 0.75rem;
            padding: 0.5rem 1rem;
            color: #242525;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            justify-content: center;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #D1D5DB;
            background-color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        @keyframes animate {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.09);
            }
        }
    </style>
</head>
<body>
    <section>
        <div class="card"> 
            <button class="dismiss" type="button">×</button> 
            <div class="header"> 
                <div class="image">
                    <a href="../index.php"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7L9.00004 18L3.99994 13" stroke="#ee0d0d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                </div> 
                <div class="content">
                    <span class="title">Supprimer une réservation</span> 
                    <p class="message">Êtes vous sûr de vouloir supprimer cette réservation ?  Cette action est irréversible.</p> 
                </div> 
                <div class="actions">
                    <button class="delete" type="button">Supprimer la réservation</button> 
                    <button class="abandonner" type="button">Abandonner</button> 
                </div> 
            </div> 
        </div>
    </section>
</body>
</html>