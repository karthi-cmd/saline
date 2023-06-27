import { Button, FormHelperText, Grid, Paper, TextField } from "@mui/material";
import { Container } from "@mui/system";

import { devicesCollectionId, db, dbId } from "../service/appwrite-config";
import { v4 as uuid } from "uuid";
import { React, useState } from "react";
import { useForm } from "react-hook-form";
import FormControl from '@mui/material/FormControl';


export default function AddDevices() {
  const { register, handleSubmit, formState: { errors } } = useForm();
  const onSubmit = (data) => console.log(data);
  console.log(errors);
  const [age, setAge] = React.useState('');


  const handleChange = (event) => {
      setAge(event.target.value);
  };
  const [deviceDetails, setDeviceDetails] = useState({
    deviceId: "",
    deviceName: "",
    description: "",
  });

  const add = async (e) => {
    e.preventDefault();

    const promise = db.createDocument(dbId, devicesCollectionId, uuid(), {
      ...deviceDetails,
    });

    promise.then(
      function (response) {
        console.log(response); // Success
        
      },
      function (error) {
        console.log(error); // Failure
      }
    );
  };

  return (
    <div>
  <form onSubmit={handleSubmit(onSubmit)}>

      <Container maxWidth="sm">
        <Grid
          container
          spacing={2}
          direction="column"
          justifyContent="center"
          style={{ minHeight: "50vh" }}
        >
          <Paper elevation={0} sx={{ padding: 5 }}>
            <Grid container direction="column" spacing={1}>
              <Grid item>
                <FormHelperText>
                  <h2>Device ID</h2>
                </FormHelperText>
                <TextField
                  onChange={(e) => {
                    setDeviceDetails({
                      ...deviceDetails,
                      deviceId: e.target.value,
                    });
                  }}
                  type="number"
                  fullWidth
                  placeholder="Enter device id "
                  variant="outlined"
                  name="did"
                  {...register("did", { required: "Device ID is required." })}
                                        error={Boolean(errors.did)}
                                        helperText={errors.did?.message}
                ></TextField>
              </Grid>
              <Grid item>
                <FormHelperText>
                  <h2>Device Name</h2>
                </FormHelperText>
                <TextField
                  onChange={(e) => {
                    setDeviceDetails({
                      ...deviceDetails,
                      deviceName: e.target.value,
                    });
                  }}
                  type="text"
                  fullWidth
                  placeholder="Enter device name"
                  variant="outlined"
                  
                ></TextField>
              </Grid>
              <Grid item>
                <FormHelperText>
                  <h1>Description</h1>
                </FormHelperText>
                <TextField
                  onChange={(e) => {
                    setDeviceDetails({
                      ...deviceDetails,
                      description: e.target.value,
                    });
                  }}
                  type="text"
                  fullWidth
                  placeholder="Description"
                  variant="outlined"
                  name="ddesc"
                 
                      {...register("ddesc", { required: "desc is required." })}
                      error={Boolean(errors.ddesc)}
                     helperText={errors.ddesc?.message}
                ></TextField>
              </Grid>

              <Grid item>
                <Button
                className="btns"
                  variant="contained"
                  type="submit"
                  onClick={(e) => add(e)}
                >
                  save
                </Button>
              </Grid>
            </Grid>
          </Paper>
        </Grid>
      </Container>
     </form>
    </div>
  );
}
