import nodemailer from 'nodemailer';

if (window.location.method === 'POST') {
    const formData = new FormData(document.querySelector('form'));
    const name = formData.get('name');
    const email = formData.get('email');
    const subject = formData.get('subject');
    const message = formData.get('message');

    if (!name || !email || !subject || !message) {
        window.location.href = 'index.html?errorField=All fields are required';
    } else {
        const transporter = nodemailer.createTransport({
            host: 'smtp.gmail.com',
            port: 587,
            secure: false,
            auth: {
                user: 'receivejeloramos10092001@gmail.com',
                pass: 'ljpv hqmt ozwq afww',
            },
        });

        const mailOptions = {
            from: email,
            to: 'receivejeloramos10092001@gmail.com',
            subject: subject,
            text: `Name: ${name}\nEmail: ${email}\nSubject: ${subject}\n\nMessage: ${message}\n`,
        };

        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                return window.location.href = 'index.html?error="Message has not been sent!"';
            }
            window.location.href = 'index.html?success="Message has been sent!"';
        });
    }
}

if (new URLSearchParams(window.location.search).has('error')) {
    console.log("ERROR" + new URLSearchParams(window.location.search).get('error'));
} else if (new URLSearchParams(window.location.search).has('success')) {
    console.log("SUCCESS" + new URLSearchParams(window.location.search).get('success'));
} else if (new URLSearchParams(window.location.search).has('errorField')) {
    console.log("ERROR" + new URLSearchParams(window.location.search).get('errorField'));
}

