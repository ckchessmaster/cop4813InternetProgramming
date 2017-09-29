# cop4813InternetProgramming
Repo for my internet programming course
This is a website that is built to showcase all of my projects for my internet programming course.

<h3>Assignment 1</h3>

<h3>Assignment 2</h3>

<h3>Assignment 3</h3>
Assignment Description

In your third assignment, we are going to focus on repetition control structures and arrays as a data structure. You are going to have to create a program that computes several different descriptive statistics based on the information that the user provides.

Part 1

First, you will need to create a form using various HTML tags. The form should collect a list of numbers from a user. I suggest simply using a text area in which the user can simply copy and paste a list of numbers. Or, you can collect the data through a list box. You can assume that the user will provide numeric data, and thus, no validation is necessary. You may use sfotware libraries starting with this assignment. I encourage you to learn at least one in this course (e.g., jQuery, AngularJS, etc.).



The form should provide locations to output the information that is calculated by the program. Specifically, the program should provide an output for the mean, median, count, summation, mode, variance and standard deviation of the list of numbers. The all of the outputs should be rounded to two decimal places (See Part 2).



Implement a function in the header of the HTML file that will, when invoked, capture the list of numbers provided by the user, parse the numbers, and populate an array of numbers based on the list that is provided. This array will then serve as input to several functions (See Part 2). This function should also, after invoking the functions below, present the information.



The form elements must be organized meaningfully on the page and be properly labeled. Also, provide clear instructions to the user on how to use the form and the form’s purpose. The page must link to your style sheet from the previous assignment. Feel free to update the style sheet as you see fit.

Part 2

Now that you have created a form to collect a list of numbers, you have to implement a program to use the information. You need to create a JavaScript file to serve as a function library. Name the file Statistics.js, and within the file, provide functions for the following statistical procedures. Your assignment HTML file must link to the function library.

N (number) – findN(array)



The N is the number of values within a list of numbers.

Summation – findSum(array)

summation.png

Mean -  findMean(array)

 mean.png

Median - findMedian(array)

The median is the middle value (odd list of numbers) or the mid-point of the middle two (event list of numbers) in a sorted list of numbers.

Mode - findMode(array)

The mode is the value that occurs the most frequently in a list of numbers. Please note this is by far the most challenging procedure you will implement. Your code should account for a multimode condition.

Variance of sample - findVariance(array)

 variance.png

Standard deviation of sample – findStandardDeviation(array)

stddev.png

Notice that there are patterns in these equations. Some aspects of these equations are derived from other equations. Your functions should make use of these patterns by having one function call another function to do intermediate processing. This reduces the amount of code you are writing and allows you to reuse the code you are writing. Remember, goals of software development include both modularity and reusability. These are two key concepts embedded within this programming assignment.



Part 3

After having completed your program, you need to conduct unit testing for each of the functions you have written. To do this, you should include three sets of data and apply each set of data to your program. Compare the results of what your program produces as output with the results of either a hand calculation or the results from a spreadsheet. Save this information in an HTML format (table) and provide a link to the test results on the assignment page.



Grading Rubric

This assignment will be evaluated using a 100 point scale.  Each of the specifications will be worth a varying number of points.  If you do not understand any of the specifications, post immediately to the discussion board on Canvas, and seek help from me.  As long as you meet all the specifications, you should receive full credit.  Late assignments will not be accepted.
