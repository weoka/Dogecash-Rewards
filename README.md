

# Dogecash rewards calculator

## Requirements
In order to to run this site you'll need:

 - A PHP server
 - Composer

## Deployment

Having your repository ready, run:

    composer install

That command will download all the libraries the project needs. If you don't have composer installed, take a look at: https://www.hostinger.com/tutorials/how-to-install-composer

Now you'll need to modify the *.env.example* file to just *.env*. (If you can't see the file, be aware that your file manager is showing hidden files. If  that isn't the case, google: show hidden files [**your os**])

If required, you can change some settings (Percentage of non staking Dogecash, Masternode collateral, rewards...) at the end of *index.php*:

    <script>
    
    let  data = {
    "supply":<?php  echo  $handler->moneySupply; ?>,
    "masternodes":<?php  echo  $handler->masternodes; ?>,
    "masternodeCollateral":  5000,
    "stakeReward":1.08,
    "masternodeReward":4.32,
    "nonStakingPercentage":0.6
    };
    let  init = new  RewardsCalculator(data);
    
    </script>

Enjoy!

## Credits

- Inspired by: https://rewards.zenzo.io/
- guzzlehttp/guzzle: https://packagist.org/packages/guzzlehttp/guzzle
