<?php
// Step 1: Connect to the MySQL database
$host = "localhost"; // Your MySQL host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "vote"; // Your database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Define all possible parties (you may need to adjust this list)
$possibleParties = ["Party 1", "Party 2", "Party 3", "Party 4"];

// Step 3: Fetch data from the vote_table
$query = "SELECT vote, COUNT(*) as count FROM vote_table GROUP BY vote";
$result = mysqli_query($conn, $query);

// Step 4: Process the data
$data = array();
$totalVotes = 0; // Initialize the total votes counter

while ($row = mysqli_fetch_assoc($result)) {
    $party = "Party {$row['vote']}";
    $count = $row['count'];

    $data[$party] = $count;

    // Increment the total votes counter
    $totalVotes += $count;
}

// Step 5: Calculate the percentage for each party and add the vote count to the label
$percentageData = array();
foreach ($possibleParties as $party) {
    $count = isset($data[$party]) ? $data[$party] : 0; // Use 0 if the party doesn't have any votes
    $percentage = ($count / $totalVotes) * 100;
    $label = "$party = $count votes"; // Add the vote count to the label
    $percentageData[$label] = $percentage;
}

// Step 6: Create an HTML page with a chart
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voting Results</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        /* Add CSS styles for the chart container */
        #chart-container {
            width: 400px;
            height: 400px;
            margin: 0 auto;
        }
        #leading-party {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }

        .center-container {
            text-align: center;
            margin-top: 2%;
        }

        /* Button Styles */
        .cool-button {
            display: inline-block;
            background-color: #7453fc;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none; /* Remove underline from links */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cool-button:hover {
            background-color: #5438c3;
        }
    </style>
</head>
<body>
    <h1>Voting Results</h1>
    <div id="chart-container">
        <canvas id="voteChart"></canvas>
    </div>
    <div id="leading-party"></div>
    <div class="center-container">
        <a class="cool-button" href="../index.html">Back</a>
    </div>
    </div>

    <script>
        // Step 7: Display the chart and leading party
        var data = <?php echo json_encode($percentageData); ?>;
        var labels = Object.keys(data);
        var values = Object.values(data);

        // Find the maximum percentage
        var maxPercentage = Math.max(...values);

        // Find all parties with the maximum percentage
        var leadingParties = labels.filter(function(label, index) {
            return values[index] === maxPercentage;
        });

        // Display the leading party or parties
        if (leadingParties.length === 1) {
            document.getElementById("leading-party").innerHTML = "Leading Party: " + leadingParties[0];
        } else {
            document.getElementById("leading-party").innerHTML = "Tied Parties: <br>" + leadingParties.join("<br> ")  + "<br><br>Total No. of Votes Casted: " + <?php echo $totalVotes; ?>;
        }
 
        // Define an array of custom colors for each party
        var colors = [
            'rgba(255, 99, 132, 0.6)', // Party 1
            'rgba(255, 159, 64, 0.6)', // Party 2
            'rgba(155, 205, 86, 0.6)', // Party 3
            'rgba(75, 192, 192, 0.6)', // Party 4
            // Add more colors for additional parties if needed
        ];

        var ctx = document.getElementById("voteChart").getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Percentage of Votes',
                    data: values,
                    backgroundColor: colors,
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.parsed || 0;
                                var parts = label.split('=');
                                if (parts.length === 2) {
                                    label = parts[0].trim();
                                    value = parts[1].trim() + ' (' + value.toFixed(2) + '%)';
                                }
                                return label + ' = ' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        // Display the leading party or parties
        if (leadingParties.length === 1) {
            var leadingParty = leadingParties[0].replace('=', '(') + ")";
            document.getElementById("leading-party").innerHTML = "Leading Party: " + leadingParty + "<br><br>Total No. of Votes Casted: " + <?php echo $totalVotes; ?>;
        } else {
            var formattedLeadingParties = leadingParties.map(function(party) {
                return party.replace('=', '(') + " votes)";
            });
            document.getElementById("leading-party").innerHTML = "Tied Parties: <br>" + tiedPartyLabels.join("<br> ")  + "<br><br>Total No. of Votes Casted: " + <?php echo $totalVotes; ?>;
        }
    </script>
</body>
</html>
<?php
// Close the MySQL connection
mysqli_close($conn);
?>
