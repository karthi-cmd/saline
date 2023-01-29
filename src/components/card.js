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

import { Link } from 'react-router-dom';





export default function OutlinedCard({deviceid, devicename}) {
  return (
    // <Link to={`/devices/${user.id}`}>
   <Card  sx={{width:300,backgroundImage:'linear-gradient(45deg,#BFF098, #6FD6FF)' ,borderColor:'black',borderRadius:'30px'}} variant="outlined" 

  >
    
      <>
      
      <CardContent >
      <Typography sx={{ fontSize: 40 }} color="#000000" gutterBottom>
       {deviceid}
      </Typography>
      <Typography variant="h5" component="div" color="#FFFFFF">
       {devicename}
      </Typography>
    </CardContent>
    
      </>
      
    </Card>
    // </Link>
  );
}