import React, { useState } from "react";
import { db, dbId, variablesCollectionId } from "../service/appwrite-config";

import { useParams } from "react-router-dom";
import { useQuery } from "react-query";
import { Stack } from "@mui/system";
import VariableCard from "../components/VariableCard";

const Variable = (deviceId) => {
  const params = useParams();
  const variableId = params.id;
  console.log(variableId);

  const [variables, setVariables] = useState({
    dpm: "-",
    capacity: "-",
    battery: "-",
    deviceId:"-",
  });
  const fetchVariables = () => {
    const promise = db.getDocument(dbId, variablesCollectionId, variableId);
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
      <h1 style={{ fontSize: 40, color: "#000" }}>DEVICE:{variables.DEVICEID}</h1>
      <Stack direction={"row"} sx={{ flexWrap: "wrap" }}>
        {/* variables.map((variable) => {
          return
            <VariableCard />
          );
        }) */}
        <VariableCard name={"Dpm"} value={variables.DPM} />
        <VariableCard name={"Capacity"} value={variables.CAPACITY} />
        <VariableCard name={"Battery"} value={variables.BATTERY} />
      </Stack>
      
    </>
    
  );
};

export default Variable;
