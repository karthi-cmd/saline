import React, { useState } from "react";
import { client, db, dbId } from "../service/appwrite-config";
import { useParams } from "react-router-dom";
import { useQuery } from "react-query";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import { Stack } from "@mui/system";

const Variable = () => {
  const params = useParams();
  const variableId = params.id;
  console.log(variableId);

  const [variables, setVariables] = useState({
    dpm: "-",
    capacity: "-",
    battery: "-",
  });
  const fetchVariables = () => {
    const promise = db.getDocument(
      "63c9a7d2d94beb5c9a33",
      "63cf98f7929c1a3b17c0",
      variableId
    );
    promise.then((response) => {
      console.log(response);
      setVariables(response);
      //   {dpm: 23, capacity: 900, battery: 40, deviceId: 54, $id: '63cfaa6517e258168fdd', …}
    });
  };
  const { isLoading, data, isError, error, isFetching } = useQuery(
    "variable",
    fetchVariables,
    {
      refetchInterval: 5000,
    }
  );

  return (
    <>
      <h1 style={{ fontSize: 40, color: "#000" }}>DEVICE:{variableId}</h1>
      <Stack direction={"row"} sx={{ flexWrap: "wrap" }}>
        {/* variables.map((variable) => {
          return (
            <VariableCard />
          );
        }) */}
        <VariableCard name={"DPM"} value={variables.dpm} />
        <VariableCard name={"CAPACITY"} value={variables.capacity} />
        <VariableCard name={"BATTERY"} value={variables.battery} />
      </Stack>
    </>
  );
};

export const VariableCard = ({ name, value }) => {
  return (
    <>
      <Grid sx={{ p: "2%" }}>
        <Card
          sx={{
            width: 225,
            height: "100%",
            backgroundImage: "linear-gradient(to right,#EC008C,#FC6767)",
            borderRadius: "10px",
          }}
          variant="outlined"
        >
          <>
            <CardContent>
              <Grid container>
                <Grid justifyContent="flex-end">
                  <Typography variant="h4" color="#FFFFFF" sx={{ pb: 2 }}>
                    {name}
                  </Typography>
                </Grid>
              </Grid>

              <Grid container>
                <Grid justifyContent="flex-end">
                  <Typography variant="h5" color="#FFFFFF" align="left">
                    {value}
                  </Typography>
                </Grid>
              </Grid>
            </CardContent>
          </>
        </Card>
      </Grid>
    </>
  );
};

export default Variable;
