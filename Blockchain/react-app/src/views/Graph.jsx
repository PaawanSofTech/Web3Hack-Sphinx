import React from "react";
import { Bar } from "react-chartjs-2";

const Graph = ({ voteData }) => {
  const parties = voteData.map((item) => item.party);
  const votes = voteData.map((item) => item.votes);

  const data = {
    labels: parties,
    datasets: [
      {
        label: "Votes",
        backgroundColor: "rgba(75,192,192,0.2)",
        borderColor: "rgba(75,192,192,1)",
        borderWidth: 1,
        hoverBackgroundColor: "rgba(75,192,192,0.4)",
        hoverBorderColor: "rgba(75,192,192,1)",
        data: votes,
      },
    ],
  };

  return (
    <div>
      <h2>Vote Results</h2>
      <Bar
        data={data}
        width={100}
        height={300}
        options={{
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        }}
      />
    </div>
  );
};

export default Graph;
