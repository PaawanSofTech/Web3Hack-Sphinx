import { useContractReader } from "eth-hooks";
import { ethers } from "ethers";
import React from "react";
import { Link } from "react-router-dom";


const highlight = {
  marginLeft: 4,
  marginRight: 8,
  /* backgroundColor: "#f9f9f9", */ padding: 4,
  borderRadius: 4,
  fontWeight: "bolder",
};

function Home({ yourLocalBalance, readContracts }) {
  const purpose = useContractReader(readContracts, "YourContract", "purpose");

  return (
    <div>
      <div style={{ margin: 150 }}>
        <h1>Voting Instructions{" "}
        </h1>

        <br></br>

        <h3>1.) Click on<span className="highlight" style={highlight}>Generate Private Key 
        </span>to proceed!
        </h3>
        <br></br>

        <h3>2.) Use<span className="highlight" style={highlight}>Vote access
        </span>to scan the Unique ID QR code 
        </h3>
        <br></br>
        
        <h3>3.) Use<span className="highlight" style={highlight}>Private key
        </span>to get an Unique Voting Access Token
        </h3>
        <br></br>

        <h3>4.) Then, Click on<span className="highlight" style={highlight}>Vote 
        </span>
        </h3>

      </div>
    </div>
  );
}

export default Home;
