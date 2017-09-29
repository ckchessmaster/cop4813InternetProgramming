# cop4813InternetProgramming
Repo for my internet programming course
This is a website that is built to showcase all of my projects for my internet programming course.

<h3>Assignment 1</h3>
<h4>Assignment Description</h4>

This is your first web page creation assignment for the course.  It is critical that you understand how to configure your web account, create folders, and properly upload files to the server. You are required to complete this assignment without the assistance of an authoring tool (e.g., DreamWeaver or NVU) as these skills are essential for the mastery of subsequent assignments.

<h4>Part 1</h4>

In this assignment, you will be creating the structure for the location of the following assignments and folder structure. You are first going to create a folder named cop4819 in your username folder. In the cop4819 folder, you will place an html file named index.html.  This web page will be an ePortfolio that provides links, brief descriptions, and reflections to all the assignments that you will do in this course.  An ePortfolio is a reflective device for you to watch your skills develop over time and for you to showcase to other interested parties.  The index.html file in the cop4819 folder should have the following information:

<ol>
  <li>The title of the web page should be “COP 4813 OR COP 5819: Internet Programming”.</li>
  <li>The web page should have a heading (H1) with “ePortfolio for COP 4813 OR COP 5819: Internet Programming” as the title and a smaller heading with your name centered on the page.</li>
  <li>The information should be structured using a Table. Alternatively, you are welcome to use CSS to structure the information on the page. Regardless, the page should have a professional look-and-feel.</li>
  <li>After the heading information, you should place a horizontal rule to separate the heading information from the first paragraph.</li>
  <li>The first paragraph heading should be titled “Assignment 1”, which should be an active link to the assign1/index.html web page using a relative path (About Me).</li>
  <li>Using the paragraph tag and a combination of text formatting tags, place a couple paragraphs directly under “Assignment 1” heading that provides a description of the first assignment and a reflection about what you learned.  You should use your words to describe this assignment – not mine.</li>
  <li>Place an unordered list under the paragraphs that lists the learning objective of this assignment as you interpret them. Keep in mind, you will have to do this for each assignment in the course upon completion and submission.</li>
  <li>Place another horizontal rule after the paragraph.  This web page will be used to link to all the subsequent assignments in the course.</li>
</ol>

<h4>Part 2</h4>

Now that you have completed the first part of the assignment, we can move on to the next.  You are to create an “About Me” web page for your first assignment in the cop4813/assign1 folder.  This about me page should contain the following information:

<ol>
  <li>Your full name.
  <li>An active link to your email account using mailto.</li>
  <li>The information should be structured using a Table or be structured using CSS. The page must have a professional look-and-feel.</li>
  <li>Three to four descriptive paragraphs about your past, present, and future. Provide things that you are willing to share online, such as your academic and professional aspirations.</li>
  <li>An image of yourself that is properly aligned with the text (text should not touch the image) in a web compatible format (i.e., jpg). If you do not have a digital image of yourself, I suggest finding a friend with a camera phone, a digital camera, or a scanner for you to use.</li>
  <li>An unordered list of your favorite web sites (minimum of 3) as active links (absolute paths). The links should open in new tabs/windows.</li>
  <li>The use of the font tag to change the color of some portion of the text on the page. This tag has been deprecated. I know this. Use it anyway, I am trying to make a point.</li>
  <li>Your schedule of courses for this semester, including the meeting times (or online), course title, and course prefix/number in a Table format.</li>
  <li>An active link back to the ePortfolio web page created as the first part of the assignment.</li>
</ol>

The “About Me” me web page should be properly formatted and should not contain any information or images that are disrespectful or that you would not want to share with everyone.

<h4>Part 3</h4>

In the first and second part of the assignment, you created static web pages using a variety of html tags. Now, you are going to create a style sheet to standardize the look and feel of your ePortfolio. The cascading style sheet will modify each of the elements in your ePortfolio so there is a consistent format.  Follow the instructions to create and integrate your cascading style sheet:

<ol>
  <li>Create a separate cascading style sheet file (.css) file extension for all changes to the ePortfolio.</li>
  <li>Link your ePortfolio pages to the cascading style sheet (external).</li>
  <li>Create a rollover effect for the active links in your ePortfolio.  The rollover effect should change the color and appearance of the text link when hovered over.</li>
  <li>Standardize the paragraph tag so that it has a consistent font-family and color.</li>
  <li>Standardize the heading tags (all of them) to have the same font.</li>
  <li>Standardize the body tag to a consistent margin.</li>
  <li>Standardize the horizontal rule to have a consistent color</li>
  <li>Standardize the background image (repeating background image) on all pages that does not interfere with the text. I suggest using the background color of the table to overlap the background images of the body.</li>
  <li>Standardize the unordered list tag to the same list style image, and position.</li>
</ol>

You are welcome to go above and beyond the expectations set in this assignment.  Be sure to, at minimum, meet the expectations set in the specifications.

<hr />
<h3>Assignment 2</h3>
<h4>Assignment Description</h4>

In your second assignment, we are going to focus on decision control structures and web form elements. You are going to have to create a site that collects some information from a user, uses this information to make decisions, and provide the user with custom feedback based on the information that they provided. You are not allowed to use any software libraries/frameworks on this assignment (e.g., jQuery). You will be able to use libraries starting on the next assignment.

<h4>Part 1</h4>

First, you will need to create a form using various HTML tags. The form should collect relevant information from the users. The type of information you collect is entirely up to you.  However, your page must minimally include:

<ol>
  <li>Textboxes to collect free form information.</li>
  <li>Radio buttons to collect one option among many.</li>
  <li>Check boxes to collect many options among many.</li>
  <li>Drop down boxes to select one option from many.</li>
  <li>A reset button option.</li>
  <li>A submit button option that will call an event (See Part 2).</li>
</ol>

These form elements must be organized meaningfully on the page and be properly labeled. Also, provide clear instructions to the user on how to complete the form and the form’s purpose. The page must link to your style sheet from the previous assignment. Feel free to update the style sheet as you see fit.

<h4>Part 2</h4>

Now that you have created a form to collect information from the user, you have to implement a program to use the information for a pre-defined purpose. Before starting this process, sit down and write down the inputs, outputs and processes that are going to be used in the program. You might try implementing the flow chart (see Part 3) before implementing the code of your program. There are minimal technical requirements, which include:

<ol>
  <li>Create a function within the HTML page in the header that will be triggered by the user clicking a button.</li>
  <li>The function must determine whether the user provided appropriate information. For example, you might check that the user provided a name or select at least one option from a list of many options.</li>
  <li>If the data is valid, continue processing the information in some way. If the data is invalid, send the user a message indicating what needs to be fixed (Note: Try not to use alert boxes. They annoy users).</li>
  <li>Assuming the data is valid, use a combination of if-then-else control and switch structures to make a decision using the data the user provides.</li>
  <li>Based on the processing of the information, present the results of the processing on the screen for the user. You could present the information in many ways, such as using document.write or a text area.</li>
</ol>

You do not have to use every piece of information you collect in the decision-making process. Your goal is to write concise decision control structures using sound logic to make a decision. If you see that you are asking the same questions multiple times, you are probably not forming your logic appropriately.

<h4>Part 3</h4>

You must create structured flow chart using Visio 2010(16) or some related software. The flowchart must use the appropriate symbols to illustrate the decision structure of your program. The structured flow chart must trace your program exactly as it is implemented. After creating the flowchart, save it as an image file for the web (e.g., gif). Either link the flowchart from the assignment page or embed the image in a good location within the page.

<hr />
<h3>Assignment 3</h3>
<h4>Assignment Description</h4>

In your third assignment, we are going to focus on repetition control structures and arrays as a data structure. You are going to have to create a program that computes several different descriptive statistics based on the information that the user provides.

<h4>Part 1</h4>

First, you will need to create a form using various HTML tags. The form should collect a list of numbers from a user. I suggest simply using a text area in which the user can simply copy and paste a list of numbers. Or, you can collect the data through a list box. You can assume that the user will provide numeric data, and thus, no validation is necessary. You may use sfotware libraries starting with this assignment. I encourage you to learn at least one in this course (e.g., jQuery, AngularJS, etc.).

The form should provide locations to output the information that is calculated by the program. Specifically, the program should provide an output for the mean, median, count, summation, mode, variance and standard deviation of the list of numbers. The all of the outputs should be rounded to two decimal places (See Part 2).

Implement a function in the header of the HTML file that will, when invoked, capture the list of numbers provided by the user, parse the numbers, and populate an array of numbers based on the list that is provided. This array will then serve as input to several functions (See Part 2). This function should also, after invoking the functions below, present the information.

The form elements must be organized meaningfully on the page and be properly labeled. Also, provide clear instructions to the user on how to use the form and the form’s purpose. The page must link to your style sheet from the previous assignment. Feel free to update the style sheet as you see fit.

<h4>Part 2</h4>

Now that you have created a form to collect a list of numbers, you have to implement a program to use the information. You need to create a JavaScript file to serve as a function library. Name the file Statistics.js, and within the file, provide functions for the following statistical procedures. Your assignment HTML file must link to the function library.

N (number) – findN(array)

The N is the number of values within a list of numbers.

Summation – findSum(array)

Mean -  findMean(array)

Median - findMedian(array)

The median is the middle value (odd list of numbers) or the mid-point of the middle two (event list of numbers) in a sorted list of numbers.

Mode - findMode(array)

The mode is the value that occurs the most frequently in a list of numbers. Please note this is by far the most challenging procedure you will implement. Your code should account for a multimode condition.

Variance of sample - findVariance(array)

Standard deviation of sample – findStandardDeviation(array)

Notice that there are patterns in these equations. Some aspects of these equations are derived from other equations. Your functions should make use of these patterns by having one function call another function to do intermediate processing. This reduces the amount of code you are writing and allows you to reuse the code you are writing. Remember, goals of software development include both modularity and reusability. These are two key concepts embedded within this programming assignment.

<h4>Part 3</h4>

After having completed your program, you need to conduct unit testing for each of the functions you have written. To do this, you should include three sets of data and apply each set of data to your program. Compare the results of what your program produces as output with the results of either a hand calculation or the results from a spreadsheet. Save this information in an HTML format (table) and provide a link to the test results on the assignment page.

<hr />
