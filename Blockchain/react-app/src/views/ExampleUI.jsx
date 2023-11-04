import React, { useState, useEffect } from "react";
import { Button, Select, notification } from "antd";
import axios from "axios";
import { Address, Events } from "../components";
import { useHistory } from "react-router-dom";

const { Option } = Select;

export default function ExampleUI({
  address,
  mainnetProvider,
  localProvider,
  readContracts,
  writeContracts,
}) {
  const [newPurpose, setNewPurpose] = useState("");
  const [isButtonClicked, setIsButtonClicked] = useState(false);
  const [isTransactionConfirmed, setIsTransactionConfirmed] = useState(false);
  const history = useHistory();

  const handleVoteClick = async () => {
    setIsButtonClicked(true);

    try {
      const response = await axios.post("http://localhost:3001/store-vote", {
        address: address,
        vote: newPurpose,
      });

      if (response.status === 200) {
        setIsTransactionConfirmed(true);
        // Redirect to a success page after a successful vote
        setTimeout(() => {
          history.push("/Hints");
        }, 1000);
      } else {
        // Handle error
      }
    } catch (error) {
      console.error("Error storing vote data:", error);
      // Handle the error as needed (e.g., show an error message)
    }
  };

  useEffect(() => {
    if (isTransactionConfirmed) {
      notification.success({
        message: "Vote Recorded Successfully",
        placement: "bottomRight",
      });
    }
  }, [isTransactionConfirmed]);

  return (
    <div>
      <div style={{ padding: 16, width: 1000, margin: "auto", marginTop: 64 }}>
        <h2>Enter the Ballot number:</h2>
        <br />
        <div style={{ margin: 8 }}>
          <Select
            onChange={(value) => {
              setNewPurpose(value);
            }}
            style={{ width: "50%" }}
            disabled={newPurpose !== "" || isButtonClicked}
          >
            <Option value="1" disabled={newPurpose !== ""}>
              Party 1
            </Option>
            <Option value="2" disabled={newPurpose !== ""}>
              Party 2
            </Option>
            <Option value="3" disabled={newPurpose !== ""}>
              Party 3
            </Option>
            <Option value="4" disabled={newPurpose !== ""}>
              Party 4
            </Option>
          </Select>
          <br />
          <br />
          <Button
            style={{ marginTop: 8 }}
            onClick={handleVoteClick}
            disabled={newPurpose === "" || isButtonClicked}
          >
            Vote!
          </Button>

          {isTransactionConfirmed && (
            <div style={{ marginTop: 16, textAlign: "center", fontSize: 16 }}>
              Thank You for Voting, Have a Good Day!
            </div>
          )}
        </div>
        <br />

        Your Address:
        <Address address={address} ensProvider={mainnetProvider} fontSize={16} />
        <br />
      </div>

    </div>
  );
}
