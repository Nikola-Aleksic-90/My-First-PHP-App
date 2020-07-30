My first PHP app.

This app is a simple Job Application app. Entire project's purpose is to demonstrate my PHP skill after finishing Udemy course for PHP + MySQL. It is demonstrating my entry level PHP and HTML coding skills and practices so dont expect much. There won't be SQL in this app. I will probably add it sometime in the future.

Project will have several versions, each adding a little bit of code.

Versions are:

v1.0 This will just be HTML code to set overall frame and location of components on page and to set names of variables.

v1.1 Considering there will be no MySQL at this time, I will store data internaly and echo it to see if it was added successfuly.

Added line:

	<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>

This will send data to itself, to the same PHP file, and I have embedded it within htmlspecialcharacters function to add aditional level of security, preventing anyone from 
injecting malicious JavaScript code into transmited data. Other added code will have a comment or description in code itself
