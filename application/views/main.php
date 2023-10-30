<!DOCTYPE html>
<html>
<head>
    <title>GPO AZC1 TEAM</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
        body {
            background-color: #f1f1f1;
            overflow: hidden;
            font-family: 'Kanit', sans-serif;
        }
        
        .animated-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            animation: animateBackground 10s linear infinite;
        }
        
        @keyframes animateBackground {
            0% { background-color: #009a92; }
            50% { background-color: #f1f1f1; }
            100% { background-color: #009a92; }
        }
        
        .centered {
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }
        
        h1 {
            color: white;
            animation: animateTextColor 10s linear infinite;
        }
        
        @keyframes animateTextColor {
            0% { color: #f1f1f1; }
            50% { color: #009a92; }
            100% { color: #f1f1f1; }
        }
        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #018895;
            padding: 10px;
            color: white;
            text-align: center;
        }
        
        @media only screen and (max-width: 600px) {
            h1 { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="animated-background"></div>
    
    <div class="centered">
        <h1>GPO AZC1 TEAM</h1>
    </div>
    
    <div class="footer">
        <img src="https://www.gpo.or.th/design/images/logo3.jpg" alt="GPO Logo">
        <p>INNOVATIVE CARE FOR LIFE</p>
    </div>
    
    <script>
        // JavaScript code goes here
        console.log("GPO AZC1 DEV TEAM !!!");
    </script>
</body>
</html>
