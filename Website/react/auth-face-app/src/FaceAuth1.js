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
    if (typeof window.faceIO === 'function') {
      this.faceIOInstance = new window.faceIO("fioac86a", "3af782f87de30f9057ce7052756e93f8");
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
          window.location.href = "another.html";
        })
        .catch((errCode) => {
          // Handle enrollment failure
          console.error("Enrollment failed. Error code:", errCode);
        });
    }
  };

  authenticateUser = () => {
    if (this.faceIOInstance) {
      // Authenticate a previously enrolled user
      this.faceIOInstance
        .authenticate({
          locale: "auto",
        })
        .then((userData) => {
          console.log("Success, user identified");
          console.log("Linked facial Id: " + userData.facialId);
          console.log("Payload: " + JSON.stringify(userData.payload));
          // Redirect to profile_user.php or your desired URL
          window.location.href = "http://localhost/Block_Vote/login_temp/profile_user_1.php";
        })
        .catch((errCode) => {
          // Handle authentication failure
          console.error("Authentication failed. Error code:", errCode);
        });
    }
  };

  render() {
    return (
      <div className="button-container">
        <div className="container">
          <h1>Face Login</h1>
          <br />
          {/* <button onClick={this.enrollNewUser} title="Enroll a new user on this FACEIO application">
            Enroll New User
          </button> */}
          <button onClick={this.authenticateUser} title="Authenticate a previously enrolled user on this application">
            Authenticate User
          </button>
        </div>
      </div>
    );
  }
}

export default FaceAuthentication;
