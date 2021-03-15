<?php

require __DIR__ . '/vendor/autoload.php';

function start()
{
    return new Inc\Handler();
}
$handler = start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogeCash Rewards Calculator</title>
    <meta name="description" content="Compare staking and masternode earnings from Dogecash possible passive incomes.">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <a href="https://dogecash.org/"><img class="logo" src="images/logo.svg" alt="Dogecash logo"></a>
</div>

<div class="container">
    <div class="box">
        <div>
            <h2>Supply breakdown</h2>
        </div>

        <div>
            <h3>
                Circulating DOGEC supply<br>
                <b id="circulatingSupply"></b>
            </h3>
        </div>

        <div>
            <h3>
                DOGEC locked on masternodes<br>
                <b id="lockedOnMasternodes"></b>
            </h3>
        </div>

        <div>
            <h3>
                DOGEC not staking (excl. MNs)<br>
                <div id="slider">
                    <input min="0" max="99" type="range" value="60" style="background: linear-gradient(to right, #A76D4A 60%, #A76D4A 60%, #D8D8D8 60%, #D8D8D8 100%);"/> <span>60%</span>
                </div>
                <b id="notstaking"></b>
            </h3>
        </div>

        <div>
            <h3>
                Estimated DOGEC staking<br>
                <b id="staking"></b>
            </h3>
        </div>

    </div>
</div>

<div class="container">
    <div class="box">
        <div>
            <h2>Rewards distribution<sup>1</sup></h2>
        </div>

        <div>
            <h3>
                Enabled masternodes<br>
                <b id="masternodes"></b>
            </h3>
        </div>

        <div>
            <h3>
                Active stakers<br>
                <b id="stakers"></b>
            </h3>
        </div>

        <div>
            <h3>
                Daily masternodes rewards<br>
                <b id="masternode-reward"></b>
            </h3>
        </div>

        <div>
            <h3>
                Daily staking rewards<br>
                <b id="staker-reward"></b>
            </h3>
        </div>

        <div>
            <h4>
                <span class="number">1.</span> Based on 5000 DOGEC each
            </h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="box">
        <div>
            <h2>Rewards calculator</h2>
        </div>

        <div>
            <h3>
                Amount of coins<br>
                <input type="number" name="coins" placeholder="1"><br>
                <input type="radio" id="male" name="allocation" value="stake" checked>
                <span class="checkmark"></span>
                <label for="male">Staking</label>
                <input type="radio" id="female" name="allocation" value="masternode">
                <span class="checkmark"></span>
                <label for="female">On masternodes</label>
            </h3>
        </div>

        <div>
            <h3>
                Daily rewards<br>
                <b id="daily-rewards">0 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Weekly rewards<br>
                <b id="weekly-rewards">0 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Monthly rewards<br>
                <b id="monthly-rewards">0 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Yearly rewards<br>
                <b id="yearly-rewards">0 DOGEC</b>
            </h3>
        </div>
    </div>
</div>

<div class="container">
    <h4>Not official Dogecash rewards calculator</h4>
</div>

<div class="container">
    <h4><a href="https://github.com/weoka/Dogecash-Rewards" target="_blank">Github Repository</a></h4>
</div>

<script src="scripts/main.js"></script>
<script>
    let data = {
        "supply":<?php echo $handler->moneySupply; ?>,
        "masternodes":<?php echo $handler->masternodes; ?>,
        "masternodeCollateral": 5000,
        "stakeReward":1.08,
        "masternodeReward":4.32,
        "nonStakingPercentage":0.6
    };
    let init = new RewardsCalculator(data);
</script>
</body>
</html>