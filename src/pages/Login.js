import {
  Button,
  Grid,
  IconButton,
  Paper,
  TextField,
  InputAdornment,
  Avatar
} from '@mui/material';
import { Container } from '@mui/system';
import LockOutlinedIcon from '@mui/icons-material/LockOutlined';
import { toast } from "react-toastify";
import { React, useState } from 'react';
import { useNavigate } from "react-router";
import { account } from '../service/appwrite-config';

const Login = ({ setAuth }) => {

  //const history = useHistory();
  const [userDetails, setUserDetails] = useState({
    email: "",
    password: "",
  });
  const navigate = useNavigate();
  const loginUser = async (e) => {
    e.preventDefault();

    try {

      const promise = account.createEmailSession(userDetails.email, userDetails.password);
      promise.then(function (response) {
        setAuth(true);

        navigate("/devices");

        console.log(response); // Success
      }, function (error) {
        console.log(error); // Failure
      });

    } catch (error) {

      toast.error(`${error.message}`)

    }
  };
 
 



  const avtarStyle = { backgroundColor: 'blue' }
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
                <Avatar style={avtarStyle}><LockOutlinedIcon /></Avatar>
                <h2>login</h2>
              </Grid>

              <Grid container direction="column" spacing={2}>

                <Grid item>
                  <TextField
                    onChange={(e) => {
                      setUserDetails({
                        ...userDetails,
                        email: e.target.value,
                      });
                    }}
                    type="email"
                    fullWidth label="enter your email"
                    placeholder='email address'
                    variant='outlined'
                    
                    required
                  >

                  </TextField>
                </Grid>
                <Grid item>
                  <TextField
                      
                    onChange={(e) => {
                      setUserDetails({
                        ...userDetails,
                        password: e.target.value,
                      });
                    }}
                    type="password"
                    fullWidth
                    label=" enter password"
                    placeholder='password'
                    variant='outlined'
                    
                    required
                    InputProps={{
                      endAdornment: (
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
                  <Button type="submit" onClick={(e) => loginUser(e) }
                  
                    variant="contained" fullWidth>Login</Button>

                </Grid>


              </Grid>

            </Paper>
          </Grid>

        </Container>
     
    </div>
  );
};





export default Login;