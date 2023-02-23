import { Link, useMatch,useNavigate, useResolvedPath } from "react-router-dom";

import { account } from "../service/appwrite-config";
import React from 'react';
import PropTypes from 'prop-types';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import CssBaseline from '@mui/material/CssBaseline';
import Divider from '@mui/material/Divider';
import Drawer from '@mui/material/Drawer';
import IconButton from '@mui/material/IconButton';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemText from '@mui/material/ListItemText';
import MenuIcon from '@mui/icons-material/Menu';
import Toolbar from '@mui/material/Toolbar';
import AddBoxOutlinedIcon from '@mui/icons-material/AddBoxOutlined';

import BeachAccessIcon from '@mui/icons-material/BeachAccess';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import Avatar from '@mui/material/Avatar';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import LogoutIcon from '@mui/icons-material/Logout';
import { Paper } from "@mui/material";
import InfoOutlinedIcon from '@mui/icons-material/InfoOutlined';
import MenuItem from '@mui/material/MenuItem';
import { styled } from '@mui/material/styles';
import Badge from '@mui/material/Badge';



const drawerWidth = 240;


const StyledBadge = styled(Badge)(({ theme }) => ({
  '& .MuiBadge-badge': {
    backgroundColor: '#44b700',
    color: '#44b700',
    boxShadow: `0 0 0 2px ${theme.palette.background.paper}`,
    '&::after': {
      position: 'absolute',
      top: 0,
      left: 0,
      width: '100%',
      height: '100%',
      borderRadius: '50%',
      animation: 'ripple 1.2s infinite ease-in-out',
      border: '1px solid currentColor',
      content: '""',
    },
  },
  '@keyframes ripple': {
    '0%': {
      transform: 'scale(.8)',
      opacity: 1,
    },
    '100%': {
      transform: 'scale(2.4)',
      opacity: 0,
    },
  },
}));

export default function Navbar({auth,loUsr},props) {
  
 
  const navigate=useNavigate()

  const logoutUser=()=>{
    const promise = account.deleteSession('current');
    //console.log(props)
    promise.then(function (response) {
    loUsr();
    navigate("/login");
   // console.log(response); // Success
  }, function (error) {
  //  console.log(error); // Failure
  });
  };
  
  const { window } = props;
  const [mobileOpen, setMobileOpen] = React.useState(false);

  const handleDrawerToggle = () => {
    setMobileOpen((prevState) => !prevState);
  };

  const drawer = (
    <Box onClick={handleDrawerToggle} sx={{ textAlign: 'center' }} backgroundColor="#5A4FCF">

      <Typography variant="h6" sx={{ my: 2 }}>
        SALINE
      </Typography>

      <List sx={{ width: '100%', maxWidth: 360, bgcolor: '#D4EFFF'}} >
      <Divider variant="middle" component="li" />
        
        
       {auth && <ListItem >
        <ListItemAvatar>
       <StyledBadge
        overlap="circular"
        anchorOrigin={{ vertical: 'bottom', horizontal: 'right' }}
        variant="dot"
      >
        <Avatar alt="Remy Sharp"  />
      </StyledBadge>
      </ListItemAvatar>
      <ListItemText primary="MY PROFILE" />
        
      </ListItem>}
      
      <Divider variant="middle" component="li" />
      
        <CustomLink to="/adddevices"  style={{ textDecoration: "none" }}>
      <ListItem  >
        <ListItemAvatar>
          <Avatar alt="Remy Sharp">
            <AddBoxOutlinedIcon />
          </Avatar>
        </ListItemAvatar>
       
        <ListItemText primary="ADD DEVICE" />
       

      </ListItem>
      
        </CustomLink>
        <Divider variant="inset" component="li" />
        <CustomLink to="/about"  style={{ textDecoration: "none" }}>
        
      <ListItem  >
        <ListItemAvatar>
          <Avatar alt="Remy Sharp">
            <InfoOutlinedIcon />
          </Avatar>
        </ListItemAvatar>
        <ListItemText primary="ABOUT" />
      </ListItem>
     
      </CustomLink>
      <Divider variant="inset" component="li" />
     
      {auth?<Paper onClick={logoutUser}  style={{ textDecoration: "none" }} variant="Text" >
      <ListItem>
        <ListItemAvatar>
          <Avatar>
          <LogoutIcon/>     
               </Avatar>
        </ListItemAvatar>
        <ListItemText primary="LOGOUT" />
      </ListItem >
      
        </Paper>: <CustomLink to="/login"  style={{ textDecoration: "none" }}>
       
      <ListItem > 
        <ListItemAvatar>
          <Avatar>
            <BeachAccessIcon />
          </Avatar>
        </ListItemAvatar>
        <ListItemText primary="LOGIN"  />
      </ListItem>
      
      </CustomLink>
      }
      
    </List>
    </Box>
  );

  const container = window !== undefined ? () => window().document.body : undefined;


  return (
    <div>
       <Box sx={{ display: 'flex' }}>
      <CssBaseline />
      <AppBar component="nav">
        
        <Toolbar>
          <IconButton
            color="inherit"
            aria-label="open drawer"
            edge="start"
            onClick={handleDrawerToggle}
            sx={{ mr: 2, display: { sm: 'none' } }}
            
            >
            
            <MenuIcon />
            
          </IconButton>
          <Link to="/devices">
          <h3 style={{float:'right',marginLeft:'40px',color:'white'}} >SALINE</h3></Link>
          <Typography
            variant="h6"
            component="div"
            sx={{ flexGrow: 1, display: { xs: 'none', sm: 'block' } }}
          >
          
          </Typography>
          <Box sx={{ display: { xs: 'none', sm: 'block' } }} className="list">
           <ul >
           {auth && <MenuItem >
        <StyledBadge
        overlap="circular"
        anchorOrigin={{ vertical: 'bottom', horizontal: 'right' }}
        variant="dot"
      >
        <Avatar alt="Remy Sharp"  />
      </StyledBadge>
        
        <p>{auth }</p>
      </MenuItem>}
           <CustomLink to="/adddevices"  style={{ textDecoration: "none" }}>ADD DEVICE</CustomLink>
            <CustomLink to="/about"  style={{ textDecoration: "none" }}>ABOUT</CustomLink>
        {auth?<Button onClick={logoutUser}  style={{ textDecoration: "none" }} variant="Text" >
                <LogoutIcon />LOGOUT
              </Button>:<CustomLink to="/login"  style={{ textDecoration: "none" }}>LOGIN</CustomLink>}
           </ul>

              
           
          </Box>
        </Toolbar>
      </AppBar>
      <Box component="nav"  >
        <Drawer
        backgroundColor="#A3C4D7"
          container={container}
          variant="temporary"
          open={mobileOpen}
          onClose={handleDrawerToggle}
          ModalProps={{
            keepMounted: true, // Better open performance on mobile.
          }}
          sx={{
            display: { xs: 'block', sm: 'none' },
            '& .MuiDrawer-paper': { boxSizing: 'border-box', width: drawerWidth },
          }}
        >
          {drawer}
        </Drawer>
      </Box>
      <Box  sx={{ p: 3 }}/>
       
       
    </Box>
    
   

    </div>
  )
}


Navbar.propTypes = {
  /**
   * Injected by the documentation to work in an iframe.
   * You won't need it on your project.
   */
  window: PropTypes.func,
};


function CustomLink({ to, children, ...props }) {
  const resolvedPath = useResolvedPath(to)
  const isActive = useMatch({ path: resolvedPath.pathname, end: true })

  return (
    <li className={isActive ? "active" : ""}>
      <Link to={to} {...props}>
        {children}
      </Link>
    </li>
  )
}


// <nav className="nav">
//       <Link to="/devices" className="site-title">
//         Saline
//       </Link>
  
//       <ul>
//         {/* {console.log(auth)} */}
        
//         <CustomLink to="/adddevices">AddDevices</CustomLink>
//         <CustomLink to="/about">About</CustomLink>
//         {auth?<Button onClick={logoutUser} variant="text">LOGOUT</Button>:<CustomLink to="/login">Login</CustomLink>}

//       </ul>
//     </nav>