import React, { Component } from 'react';

class FaceAuthentication extends Component {
  constructor() {
    super();
    this.state = {
      // You can add any necessary state here
    };
    this.faceIOInstance = null; // Initialize the FaceIO instance
  }

  componentDidMount() {
    // Initialize FaceIO library when the component mounts
    this.initFaceIO();
  }

  initFaceIO() {
    console.log("Initializing FaceIO");
    if (typeof window.faceIO === 'function') {
      this.faceIOInstance = new window.faceIO("fioad083", "902a5f029327afb6f339b5123e5fb526");
      console.log("FaceIO Initialized");
    } else {
      console.error("FaceIO library not found.");
    }
  }
  

  enrollNewUser = () => {
    if (this.faceIOInstance) {
      // Start the facial enrollment process
      this.faceIOInstance
        .enroll({
          locale: "auto",
          payload: {
            whoami: 123456,
            email: "john.doe@example.com",
          },
        })
        .then((userInfo) => {
          alert(
            `User Successfully Enrolled! Details:
            Unique Facial ID: ${userInfo.facialId}
            Enrollment Date: ${userInfo.timestamp}
            Gender: ${userInfo.details.gender}
            Age Approximation: ${userInfo.details.age}`
          );
          console.log(userInfo);
          // Redirect to another.html
          window.location.href = "register_process.php";
        })
        .catch((errCode) => {
          // handle enrollment failure
          // Visit: https://faceio.net/integration-guide#error-codes for error codes
        });
    }
  };

  render() {
    return (
      <div className="button-container">
        <div className="container">
          <h1>Face Login</h1>
          <br />
          <button onClick={this.enrollNewUser} title="Enroll a new user on this FACEIO application">
            Enroll New User
          </button>
          {/* <button onClick={this.authenticateUser} title="Authenticate a previously enrolled user on this application">
            Authenticate User
          </button> */}
        </div>
      </div>
    );
  }
}

export default FaceAuthentication;
