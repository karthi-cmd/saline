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


import { Link } from '@mui/material';





export default function OutlinedCard({deviceid, devicename}) {

  return (
    
    // <Link to={`/devices/${user.id}`}>
   <Card  sx={{width:350, backgroundColor:'#6ae29c',borderRadius:'8px' }} variant="outlined" 

  >
    {/* {console.log(deviceid)} */}
    {/* <={'/variable/{deviceid}'}>
      variables
    </Link> */}
    <Link href={"/variable/"+deviceid} underline='none'>
      
      
      <>
      
      <CardContent >
      <Typography sx={{ fontSize: 40 }} color="#FFFFFF" gutterBottom>
       {deviceid}
      </Typography>
      <Typography variant="h3" component="div" color="#FFFFFF">
       {devicename}
      </Typography>
    </CardContent>
    
      </>
      </Link><br/>
      
    </Card> 
    // </Link>
    
  );
}