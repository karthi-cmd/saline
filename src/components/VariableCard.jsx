import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";



const VariableCard = ({ name, value }) => {

  return (
    <>
      <Grid sx={{ p: "2%" }}>
        <Card
          sx={{
            width: 225,
            height: "100%",
            backgroundImage: "linear-gradient(to right,#000428,#004E92)",
            borderRadius: "10px",
            
          }}
          variant="outlined"
          
        >

          <>
            <CardContent>
              
                <Grid container justifyContent="flex-start" >
                  <Typography variant="h4" color="#FFFFFF" sx={{ pd: 2 }}>
                    {name}
                  </Typography>

                </Grid>
             

              <Grid container justifyContent="flex-start">
                  <Typography variant="h3" color="#FFFFFF" align="left">
                    {value}
                  </Typography>
                
              </Grid>
            </CardContent>
          </>
        </Card>
      </Grid>
    </>
  );
};

export default VariableCard;
