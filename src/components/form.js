import React, {useRef} from 'react';

import FormHelperText from '@mui/material/FormHelperText';
import {
    Button,
    
    Grid,
    Paper,
    TextField,
    
} from '@mui/material';
import { Container } from '@mui/system';
import { useForm } from "react-hook-form";


export default function Form() {
    const { register, handleSubmit,  formState: { errors } } = useForm();
    const onSubmit = (data) => console.log(data);
    console.log(errors);

    
    
  const deviceForm = useRef(null);

  const handleClickEvent = (e) => {
    e.preventDefault();
    const form = deviceForm.current
    // alert(`${form['firstname'].value} ${form['lastname'].value}`)
    console.log(`${form['deviceid'].value} ${form['devicename'].value}`)
    handleSubmit(onSubmit)
 }
    


   

    return (
        <div>
            <form ref={deviceForm} onSubmit={handleClickEvent}>
                <Container maxWidth="sm">
                    <Grid
                        container
                        spacing={2}
                        direction="column"
                        justifyContent="center"
                        style={{ minHeight: "80vh" }}

                    >

                        <Paper elevation={20} sx={{ padding: 5 }}>
                        <Grid align='center'>
                       
                        <h2>DEVICE</h2>
                        </Grid>


                            <Grid container direction="column" spacing={2}>
                                <Grid item>
                                <FormHelperText>Device ID</FormHelperText>
                                <TextField
                                    fullWidth
                                    placeholder='Enter device id '
                                    variant='outlined'
                                    name={'deviceid'}
                                    {...register("deviceid", { required: "Id is required." })}
                                    error={Boolean(errors.dvar)}
                                    helperText={errors.dvar?.message}
                                >

                                </TextField>
                            </Grid>
                                <Grid item>
                                    <FormHelperText>Device Name</FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder="Enter unit"
                                        variant='outlined'
                                        name={'devicename'}
                                        {...register("devicename", { required: "name is required." })}
                                        error={Boolean(errors.var)}
                                        helperText={errors.var?.message}
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText>Description</FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder='Description'
                                        variant='outlined'
                                        name={'devicedesc'}
                                        {...register("devicedesc", { required: "desc is required." })}
                                        error={Boolean(errors.desc)}
                                        helperText={errors.desc?.message}
                                        
                                    >

                                    </TextField>
                                </Grid>

                                <Grid item>
                                    <Button variant="contained" color="primary" type="submit" className="btns">
                                        Save
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