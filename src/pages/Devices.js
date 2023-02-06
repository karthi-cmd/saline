import React, { useState, useEffect } from "react";
import { db } from "../service/appwrite-config";
import OutlinedCard from "../components/card";
import { Stack } from "@mui/system";
import { spacing } from "@mui/system";
import Grid from "@mui/material/Grid";
import { FlexboxProps } from "@mui/system";
export default function Devices() {
  const [devices, setDevices] = useState([]);

  useEffect(() => {
    const promise = db.listDocuments(
      "63c9a7d2d94beb5c9a33",
      "63cafcabe06d83c31e33"
    );
    promise.then(
      function (response) {
        console.log(response);
        setDevices(response.documents);
      },
      function (error) {
        console.log(error);
      }
    );
  }, []);

  return (
    <>
      <Stack direction="row" sx={{ flexWrap: "wrap" }}>
        {devices.map((device) => (
          <OutlinedCard
            key={device.deviceId}
            deviceid={device.deviceId}
            devicename={device.deviceName}
            variableId={device.variableId}
          />
        ))}
      </Stack>
    </>
  );
}
