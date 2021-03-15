<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogecash rewards</title>
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <img class="logo" src="https://chain.dogec.io/public/img/grafana_icon.svg" alt="Dogecash logo">
</div>

<div class="container">
    <div class="box">
        <div>
            <h2>Supply breakdown</h2>
        </div>

        <div>
            <h3>
                Circulating DOGEC supply<br>
                <b>14,000,000</b>
            </h3>
        </div>

        <div>
            <h3>
                DOGEC locked on masternodes<br>
                <b>14,000,000</b>
            </h3>
        </div>

        <div>
            <h3>
                DOGEC not staking<br>
                <div id="slider">
                    <input min="0" max="99" type="range" value="30" style="background: linear-gradient(to right, #A76D4A 0%, #A76D4A 30%, #D8D8D8 30%, #D8D8D8 100%);"/> <span>30%</span>
                </div>
                <b id="notstaking">7,000,000</b>
            </h3>
        </div>

        <div>
            <h3>
                Estimated DOGEC staking<br>
                <b id="staking">7,000,000</b>
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
                <b>1,500</b>
            </h3>
        </div>

        <div>
            <h3>
                Active stakers<br>
                <b id="stakers">1,500</b>
            </h3>
        </div>

        <div>
            <h3>
                Daily masternodes rewards<br>
                <b id="masternode-reward">4.2 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Daily staking rewards<br>
                <b id="staker-reward">1.08 DOGEC</b>
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
                <b id="daily-rewards">1.5 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Weekly rewards<br>
                <b id="weekly-rewards">10.5 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Monthly rewards<br>
                <b id="monthly-rewards">45 DOGEC</b>
            </h3>
        </div>

        <div>
            <h3>
                Yearly rewards<br>
                <b id="yearly-rewards">547 DOGEC</b>
            </h3>
        </div>
    </div>
</div>

<script src="/scripts/main.js"></script>
<script>
    let data = {
        "supply":14308989,
        "masternodes":1570,
        "masternodeCollateral": 5000,
        "stakeReward":1.08,
        "masternodeReward":4.32,
        "nonStakingPercentage":0.1
    };
    let init = new RewardsCalculator(data);
</script>
</body>
</html>