

<?php

$employeesString = <<<XML
<employees>
<employee ID="1" FOO="BAR">
<name>Anthony Clarke</name>
<title>Chief Information Officer</title>
<age>48</age>
</employee>
<employee ID="2" BAZ="WOM">
<name>Laura Pollard</name>
<title>Chief Executive Officer</title>
<age>54</age>
</employee>
</employees>
XML;
$XMLemployees = simplexml_load_string($employeesString);
//0. get all the employees
foreach ($XMLemployees->employee as $employee) {
    print "{$employee->name} is {$employee->title} at age {$employee->age}\n";
}
//1.Look in all the employees elements, find any employee elements in there, 
//and retrieve all the names of them.
// It's very specific because only employees/employee/name is matched.
echo "----<br/><strong>Using direct method...</strong><br />";
echo "/employees/employee/name<br/>";
$names = $XMLemployees->xpath('/employees/employee/name');
foreach ($names as $name) {
    echo "Found $name<br />";
}
echo "<br />";

//2.The second query matches all employee elements inside employees, 
//but doesn't go specifically for the name of the employees. 
//As a result, we get the full employee back, 
//and need to print $employee->name to get the name
echo "<strong>Using indirect method...</strong><br />";
echo '/employees/employee<br/>';
$employees = $XMLemployees->xpath('/employees/employee');
foreach ($employees as $employee) {
    echo "Found {$employee->name}<br />";
}
echo "<br />";

//3. The last one just looks for name elements, but note that it starts with "//" - 
//this is the signal to do a global search for all name elements, 
//regardless of where they are or how deeply nested they are in the document.
echo "<strong>Using wildcard method...</strong><br />";
echo "//name<br/>";
$names = $XMLemployees->xpath('//name');
foreach ($names as $name) {
    echo "Found $name<br />";
}

//4.The first query grabs all employees elements, then all employee elements inside it, 
//but then filters them so that only those that have a name that matches Laura Pollard
echo "<strong>Matching employees with name 'Laura Pollard'</strong><br />";
echo '/employees/employee[name="Laura Pollard"]<br/>';
$employees = $XMLemployees->xpath('/employees/employee[name="Laura Pollard"]');

foreach ($employees as $employee) {
    echo "Found {$employee->name}<br />";
}

echo "<br />";
//5.The first query grabs all employees elements, then all employee elements inside it, 
//but then filters them so that only those that have age<54  matches
echo "<strong>Matching employees younger than 54</strong><br />";
echo '/employees/employee[age<54]<br/>';
$employees = $XMLemployees->xpath('/employees/employee[age<54]');

foreach ($employees as $employee) {
    echo "Found {$employee->name}<br />";
}

echo "<br />";
//6.go straight to all employee elements,, 
//but then filters them so that only those that have age>48  matches
echo "<strong>Matching employees as old or older than 48</strong><br />";
echo '//employee[age>=48]<br/>';
$employees = $XMLemployees->xpath('//employee[age>=48]');

foreach ($employees as $employee) {
    echo "Found {$employee->name}<br />";
}

echo "<br />";

//7.Find the name of employee(s) whose age is less than 40 , or more than 50
echo '//employee[age<40]/name|//employee[age>50]/name<br/>';
$names = $XMLemployees->xpath('//employee[age<40]/name|//employee[age>50]/name');

foreach ($names as $name) {
    echo "Found $name ";
}

//8.Find the name of employee(s) whose id=2
echo '//employee[@ID=2]/name<br/>';
$names = $XMLemployees->xpath('//employee[@ID=2]/name');
foreach ($names as $name) {
    echo "Found $name ";
}
echo '<pre>';
print_r($XMLemployees);
echo '</pre>';

$query_string = 'file=' . urlencode($_SERVER['PHP_SELF']);
        echo '<a href=../userFunctions/viewSource.php?' . htmlentities($query_string) . '>' . 'view source </a>';
?>

