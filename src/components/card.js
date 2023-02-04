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
import React from 'react';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import Typography from '@mui/material/Typography';
import Grid from '@mui/material/Grid';
import { Link, Paper } from '@mui/material';





export default function OutlinedCard({deviceid, devicename}) {

  return (
    
    // <Link to={`/devices/${user.id}`}>
    <Grid  sx={{p:'2%'}}>
     
   <Card  sx={{width:225,height:'100%',backgroundImage:'linear-gradient(to right,#8E2DE2,#4A00E0)',borderRadius:'10px' }}
    variant="outlined"  
    
    
    >
    {/* {console.log(deviceid)} */}
    {/* <={'/variable/{deviceid}'}>
      variables
    </Link> */}
    <Link href={"/variable/"+deviceid} underline='none'>
      
      
      <>
      
     <CardContent>
        <Grid container>
          <Grid justifyContent='flex-end'>
      <Typography variant="h4"color="#FFFFFF" sx={{pb:2}} >
       {deviceid}
     </Typography>
     </Grid></Grid>

     <Grid container>
          <Grid justifyContent='flex-end'>
      <Typography variant="h5"  color="#FFFFFF" align='left'>
       {devicename}
      </Typography>
      </Grid></Grid>
   
    
      </CardContent>
      
      </>
    </Link>
    </Card> 
    </Grid>
   
   );
}