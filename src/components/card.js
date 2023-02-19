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
import { Avatar } from "@mui/material";
import MedicalServicesOutlinedIcon from '@mui/icons-material/MedicalServicesOutlined';


export default function OutlinedCard({ deviceid, devicename, variableId }) {
  const icon={backgroundColor:'#4A00E0' }
  return (
    // <Link to={`/devices/${user.id}`}>
   
      
      <Grid sx={{ p: "2%" }}>
       <Card
          sx={{
            width: 225,
            height: "100%",
            backgroundImage: "linear-gradient(to right,#8E2DE2,#4A00E0)",
            borderRadius: "10px",
            boxShadow:10

          }}
          variant="outlined"
        > 
          {/* {console.log(deviceid)} */}
          {/* <={'/variable/{deviceid}'}>
      variables
    </Link> */}

          <>
            <CardContent>
            <Link to={"/variable/" + variableId} style={{ textDecoration: "none" }}>
              
                    <Grid container justifyContent="flex-start">
                    <Typography variant="h4" color="#FFFFFF" sx={{ pd: 2}} >
                      {deviceid}
                    </Typography>
    <Avatar style={icon}sx={{width: 50, height: 50,left:'100px' }}  variant="square" > <MedicalServicesOutlinedIcon sx={{ fontSize: 40,right:'10' }}/></Avatar>
    
                    </Grid>
                    </Link>

              <Grid container justifyContent="flex-start">
                
                  <Typography variant="h5" color="#FFFFFF" align="left">
                    {devicename}
                  </Typography>
                
              </Grid>
            </CardContent>
        
          </>

        </Card>

      </Grid>
 
  );
}
