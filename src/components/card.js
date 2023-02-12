// import React from 'react';
// import Box from '@mui/material/Box';
// import CardContent from '@mui/material/CardContent';
// import Typography from '@mui/material/Typography';
// import { Link } from 'react-router-dom';

// export default function OutlinedCard({deviceid, devicename}) {
//   return (
//     // <Link to={`/variables/${user.id}`}>
//    <Box sx={{width:300}}
//    >
//       <>
//       <CardContent >
//       <Typography sx={{ fontSize: 50 }} color="text.secondary" gutterBottom>
//         {deviceid}
//       </Typography>
//       <Typography variant="h5" component="div">
//         {devicename}
//       </Typography>
//     </CardContent>
//       </>
//     </Box>
//     // </Link>
//   );
// }
import React from "react";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import { Link } from "react-router-dom";
import Draggable from "react-draggable";
import { Avatar } from "@mui/material";
import { blue} from '@mui/material/colors';
import MonitorHeartIcon from '@mui/icons-material/MonitorHeart';

export default function OutlinedCard({ deviceid, devicename, variableId }) {
  return (
    // <Link to={`/devices/${user.id}`}>
    <Draggable>
      <Grid sx={{ p: "2%" }}>
        <Card
          sx={{
            width: 225,
            height: "100%",
            backgroundImage: "linear-gradient(to right,#8E2DE2,#4A00E0)",
            borderRadius: "10px",
          }}
          variant="outlined"
        >
           <Avatar sx={{ bgcolor:blue[800] , width: 50, height: 50,position:'absolute',right:'34px'}} variant="square" > <MonitorHeartIcon sx={{ fontSize: 40 }}/></Avatar>
          {/* {console.log(deviceid)} */}
          {/* <={'/variable/{deviceid}'}>
      variables
    </Link> */}

          <>
            <CardContent>
            <Link to={"/variable/" + variableId} style={{ textDecoration: "none" }}>
              <Grid container>
              
                  <Grid justifyContent="flex-end">
                 
                    <Typography variant="h4" color="#FFFFFF" sx={{ pb: 2 }}>
                      {deviceid}
                    </Typography>
                  </Grid>
            
              </Grid>
                    </Link>

              <Grid container>
                <Grid justifyContent="flex-end">
                  <Typography variant="h5" color="#FFFFFF" align="left">
                    {devicename}
                  </Typography>
                </Grid>
              </Grid>
            </CardContent>
          </>

        </Card>
      </Grid>
    </Draggable>
  );
}
