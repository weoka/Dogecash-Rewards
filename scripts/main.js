class RewardsCalculator
{
    constructor(data)
    {
        //data
        this.supply = Number(data.supply);
        this.masternodes = Number(data.masternodes);
        this.stakeReward = Number(data.stakeReward);
        this.masternodeReward = Number(data.masternodeReward);
        this.masternodeAllocation = Number(data.masternodeCollateral);
        this.nonStakingPercentage = Number(data.nonStakingPercentage);
        this.dailyStakingRewards = this.stakeReward * 1440;
        this.dailyMasternodeRewards = this.masternodeReward * 1440;

        //HTML elements
        this.range = document.querySelector("#slider input");
        this.rangespan = document.querySelector("#slider span");
        this.nonstakingfigure = document.querySelector("#notstaking");
        this.stakingfigure = document.querySelector("#staking");
        this.stakersfigure = document.querySelector("#stakers");
        this.individualStakerRewardfigure = document.querySelector("#staker-reward");
        this.individualMasternodeRewardfigure = document.querySelector("#masternode-reward");
        this.customCoins = document.getElementsByName('coins')[0];
        this.coinsType = document.getElementsByName('allocation');
        this.dailyRewards = document.querySelector("#daily-rewards");
        this.weeklyRewards = document.querySelector("#weekly-rewards");
        this.monthlyRewards = document.querySelector("#monthly-rewards");
        this.yearlyRewards = document.querySelector("#yearly-rewards");


        //Update range and all calcs
        this.update();
    }

    update() {
        this.range.oninput = function() {
            var value = (this.range.value - this.range.min) / (this.range.max - this.range.min) * 100;
            this.range.style.background = 'linear-gradient(to right, #A76D4A 0%, #A76D4A ' + value + '%, #D8D8D8 ' + value + '%, #D8D8D8 100%)';
            this.rangespan.innerHTML=this.range.value+'%';
            //update things
            this.nonStakingPercentage = Number(this.range.value/100);
            this.updateCalcs();
        }.bind(this);

        this.customCoins.oninput = function() {
            this.updateCalcs();
        }.bind(this);

        this.coinsType[0].onclick = function() {
            this.updateCalcs();
        }.bind(this);

        this.coinsType[1].onclick = function() {
            this.updateCalcs();
        }.bind(this);
    }

    updateCalcs() { 
        this.notStaking = (this.supply- (this.masternodes*this.masternodeAllocation) ) * this.nonStakingPercentage;
        this.staking = this.supply - (this.notStaking + this.masternodes*this.masternodeAllocation);
        this.stakers = this.staking/this.masternodeAllocation;
        this.individualStakerReward = this.dailyStakingRewards/this.stakers;
        this.individualMasternodeReward = this.dailyMasternodeRewards/this.masternodes;
        this.coins = Number(this.customCoins.value);

        if(this.coinsType[0].checked)
        {
            var calcReward = this.individualStakerReward;
        }
        else
        {
            var calcReward = this.individualMasternodeReward;
        }

        //print calcs
        this.nonstakingfigure.innerHTML = Number(this.notStaking.toFixed(0)).toLocaleString();
        this.stakingfigure.innerHTML = Number(this.staking.toFixed(0)).toLocaleString();
        this.stakersfigure.innerHTML = Number(this.stakers.toFixed(0)).toLocaleString();
        this.individualStakerRewardfigure.innerHTML = Number(this.individualStakerReward.toFixed(2)).toLocaleString() + ' DOGEC';
        this.individualMasternodeRewardfigure.innerHTML = Number(this.individualMasternodeReward.toFixed(2)).toLocaleString() + ' DOGEC';
        this.dailyRewards.innerHTML = Number( ( this.coins/this.masternodeAllocation * calcReward ) ).toFixed(2).toLocaleString() + ' DOGEC';
        this.weeklyRewards.innerHTML = Number( ( this.coins/this.masternodeAllocation * calcReward * 7 ) ).toFixed(2).toLocaleString() + ' DOGEC';
        this.monthlyRewards.innerHTML = Number( ( this.coins/this.masternodeAllocation * calcReward * 30 ) ).toFixed(2).toLocaleString() + ' DOGEC';
        this.yearlyRewards.innerHTML = Number( ( this.coins/this.masternodeAllocation * calcReward * 365 ) ).toFixed(2).toLocaleString() + ' DOGEC';
    }
}

