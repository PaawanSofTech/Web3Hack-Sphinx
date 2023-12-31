import React, { useState } from "react";
import { useBalance } from "eth-hooks";
import { getRPCPollTime } from "../helpers";

const { utils } = require("ethers");


export default function Balance(props) {
  const [dollarMode, setDollarMode] = useState(true);

  // let localProviderPollingTime = getRPCPollTime(props.provider);

  // const balance = useBalance(props.provider, props.address, localProviderPollingTime);
  // let floatBalance = parseFloat("0.00");
  // let usingBalance = balance;

  // if (typeof props.balance !== "undefined") usingBalance = props.balance;
  // if (typeof props.value !== "undefined") usingBalance = props.value;

  // if (usingBalance) {
  //   const etherBalance = utils.formatEther(usingBalance);
  //   parseFloat(etherBalance).toFixed(2);
  //   floatBalance = parseFloat(etherBalance);
  // }

  // let displayBalance = floatBalance.toFixed(4);

  // const price = props.price || props.dollarMultiplier || 1;

  // if (dollarMode) {
  //   displayBalance = "$" + (floatBalance).toFixed(2);
  // }

  return (
    <span
      style={{
        verticalAlign: "middle",
        fontSize: props.size ? props.size : 24,
        padding: 8,
        cursor: "pointer",
      }}
      onClick={() => {
        setDollarMode(!dollarMode);
      }}
    >
      {/* {displayBalance} */}
    </span>
  );
}
