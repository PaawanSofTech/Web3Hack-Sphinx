// SPDX-License-Identifier: MIT
pragma solidity >=0.8.0 <0.9.0;

contract YourContract {
    event SetPurpose(address sender, string purpose);
    event VoteCasted(address sender, uint8 partyNumber);

    string public purpose = "Building Unstoppable Apps!!!";

    mapping(uint8 => uint256) public partyVotes;
    uint256[] public eventPartyNumbers; // Store the party numbers from VoteCasted events

    constructor() payable {
        // what should we do on deploy?
    }

    function setPurpose(string memory newPurpose) public payable {
        purpose = newPurpose;
        emit SetPurpose(msg.sender, purpose);
    }

    function vote(uint8 partyNumber) public {
        require(partyNumber >= 1 && partyNumber <= 4, "Invalid party number");

        partyVotes[partyNumber]++;
        eventPartyNumbers.push(partyNumber); // Store the party number in the array

        emit VoteCasted(msg.sender, partyNumber);
    }

    function getVoteCounts() public view returns (uint256[4] memory) {
        uint256[4] memory voteCounts;
        for (uint8 i = 1; i <= 4; i++) {
            voteCounts[i - 1] = partyVotes[i];
        }
        return voteCounts;
    }

    function getEventPartyNumbers() public view returns (uint256[] memory) {
        return eventPartyNumbers;
    }

    // to support receiving ETH by default
    receive() external payable {}
    fallback() external payable {}
}
