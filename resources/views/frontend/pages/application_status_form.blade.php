<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BritFly Jobs Application Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Reset default styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    header {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    input[type="file"] {
        display: flex;
        align-items: center;
    }

    input[type="file"]::file-selector-button {
        margin-right: 10px;
    }

    small {
        font-size: 12px;
        color: #777;
    }

    button.btn-next {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #2c3e50;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button.btn-next:hover {
        background-color: #233140;
    }

    footer {
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        background-color: #f4f4f4;
        border-top: 1px solid #ddd;
    }
</style>

<body>
    <div class="container">
        <header>
            <img src="logo.png" alt="BritFly Jobs Logo" class="logo">
            <h1>𝑺𝑯𝑨𝑯𝑹𝑰𝑨𝑹 𝑾𝑶𝑹𝑳𝑫𝑾𝑰𝑫𝑬 𝑽𝑬𝑵𝑻𝑼𝑹𝑬𝑺 Jobs</h1>
            <p><a href="#" style="color: red;">Applied already? Click here to check status.</a></p>
        </header>

        <form id="applicationForm">
            <div class="form-group">
                <label for="jobCategory">Job Category Name *</label>
                <select id="jobCategory" name="jobCategory" required>
                    <option value="">Select Job Category</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="tel" id="phone" name="phone" placeholder="e.g., 01XXXXXXXXX" pattern="[0-9]{10}" required>
                <small>Minimum 10 digits</small>
            </div>

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="e.g., Jon Snow" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="jon@example.com" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="201 Tornhen's Squares, Winterfell">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="">Select option</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">
            </div>

            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png">
                <small>Allowed file formats: jpg, jpeg, png</small>
            </div>

            <div class="form-group">
                <label for="passportNo">Passport No</label>
                <input type="text" id="passportNo" name="passportNo">
            </div>

            <div class="form-group">
                <label for="nationality">Nationality *</label>
                <select id="nationality" name="nationality" required>
                    <option value="">Select option</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="canada">Canada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="currentCountry">Current Country *</label>
                <select id="currentCountry" name="currentCountry" required>
                    <option value="">Select option</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="canada">Canada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="englishCourse">English Course Certificate</label>
                <select id="englishCourse" name="englishCourse">
                    <option value="">Select option</option>
                    <option value="course1">Course 1</option>
                    <option value="course2">Course 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="experienceYear">Experience Year</label>
                <input type="number" id="experienceYear" name="experienceYear">
            </div>

            <div class="form-group">
                <label for="cv">Upload CV</label>
                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx,.ppt,.pptx">
                <small>Accepted file formats: pdf, doc, docx, ppt, pptx</small>
            </div>

            <div class="form-group">
                <label for="videoLink">Work Related Video Link</label>
                <input type="text" id="videoLink" name="videoLink">
            </div>

            <button type="submit" class="btn-next">Next</button>
        </form>

    </div>

    <script src="script.js"></script>
</body>

</html>