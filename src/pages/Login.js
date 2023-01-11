import {
    Button, 
    Grid, 
    IconButton, 
    Paper, 
    TextField,
    InputAdornment, 
    Avatar } from '@mui/material';
import { Container } from '@mui/system';
import LockOutlinedIcon from '@mui/icons-material/LockOutlined';

import React from 'react';

const Login = () => {
    const avtarStyle={backgroundColor:'blue'}
    return (
        <div>
            <Container maxWidth="sm">
                <Grid
                    container
                    spacing={2}
                    direction="column"
                    justifyContent="center"
                    style={{ minHeight: "100vh" }}
                     
                >
                    
                    <Paper elevation={20} sx={{ padding: 5 }}>
                    <Grid align='center'>
                        <Avatar style={avtarStyle}><LockOutlinedIcon/></Avatar>
                        <h2>login</h2>
                        </Grid>
                        
                        <Grid container direction="column" spacing={2}>
                            <Grid item>
                                <TextField
                                    type="email"
                                    fullWidth label="enter your email"
                                    placeholder='email address'
                                    variant='outlined'
                                >

                                </TextField>
                            </Grid>
                            <Grid item>
                                <TextField
                                    type="password"
                                    fullWidth 
                                    label=" enter password"
                                    placeholder='password'
                                    variant='outlined'
                                    InputProps={{
                                        endAdornment:(
                                            <InputAdornment position="end">
                                                <IconButton aria-label='toggle password' 
                                                edge='end'
                                                >

                                                </IconButton>
                                            </InputAdornment>
                                        )
                                    }}

                                    
                                    
                                >

                                </TextField>
                            </Grid>
                            <Grid item>
                            <Button variant="contained" fullWidth>Login</Button>
                             
                            </Grid>



                        </Grid>

                    </Paper>
                </Grid>

            </Container>
        </div>
    );
};

export default Login;