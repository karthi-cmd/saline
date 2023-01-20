import {
  Button, 
  FormHelperText, 
  Grid,  
  Paper, 
  TextField,
  } from '@mui/material';
import { Container } from '@mui/system';


import {React} from 'react';


export default function AddDevices() {
  return (
    <div>
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
                        <FormHelperText><h2>Device ID</h2></FormHelperText>
                            <TextField
                                type="number"
                                fullWidth 
                                placeholder='Enter device id '
                                variant='outlined'
                            >

                            </TextField>
                        </Grid>
                        <Grid item>
                        <FormHelperText><h2>Device Name</h2></FormHelperText>
                            <TextField
                                type="text"
                                fullWidth 
                                placeholder='Enter device name'
                                variant='outlined'
                            >

                            </TextField>
                        </Grid>
                        <Grid item>
                         <FormHelperText><h2>Description</h2></FormHelperText>
                        <TextField
                                type="email"
                                fullWidth 
                                placeholder='Description'
                                variant='outlined'
                            >

                            </TextField>
                        </Grid>
                        
                        <Grid item>
                        <Button variant="contained" type="button" >Save</Button>
                         
                        </Grid>



                    </Grid>

                </Paper>
            </Grid>

        </Container>
    </div>
);
};
 