V <?php
// Initial ages
$malik_age_now = 20;
$maria_age_now = 17;
echo "<br>";

// Q1. Maria's age when Malik becomes 25
$malik_age_future = 25;
$maria_age_future = $malik_age_future - ($malik_age_now - $maria_age_now);
echo "Q1. Maria will be " . $maria_age_future . " years old when Malik is 25.";
echo "<br>";
echo "<br>";

// Q2. Total age by 2025
$current_year = 2024;
$future_year = 2025;
$years_diff = $future_year - $current_year;
$malik_age_2025 = $malik_age_now + $years_diff;
$maria_age_2025 = $maria_age_now + $years_diff;
$total_age_2025 = $malik_age_2025 + $maria_age_2025;
echo "Q2. Their total age by 2025 will be " . $total_age_2025 . " years.";
echo "<br>";
echo "<br>";

// Q3. Age of their child in 4 years after birth
$marriage_year = 2027;
$child_birth_year = $marriage_year + 2;
$future_year_for_child = $child_birth_year + 4;
$child_age_future = $future_year_for_child - $child_birth_year;
echo "Q3. Their child will be " . $child_age_future . " years old in 4 years after birth.";
echo "<br>";
echo "<br>";

// Q4. Total number of months their child has at the age of 3 years from the date of pregnancy
$child_age_in_years = 3;
$months_in_year = 12;
$pregnancy_months = 9;
$total_months = ($child_age_in_years * $months_in_year) + $pregnancy_months;
echo "Q4. The total number of months their child has at the age of 3 years from the date of pregnancy is " . $total_months . " months.";
?>