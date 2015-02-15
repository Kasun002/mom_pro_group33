<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Report Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/agency.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            function myFunction() {
                var x = document.forms["form1"]["systolic"].value;
                var y = document.forms["form1"]["diastolic"].value;
                var z = document.forms["form1"]["id"].value;

                if ((y != null || y != "") && (x == null || x == "")) {
                    alert("Systolic Pressure must be filled out");
                    return false;
                }
                else if ((x != null || x != "") && (y == null || y == "")) {
                    alert("Diastolic Pressure must be filled out");
                    return false;
                }


                else if (z == null || z == "") {
                    alert("Your ID must be filled out");
                    return false;
                }

                else if (isNaN(z)) {
                    alert("ID field should be filled with numbers");
                    return false;
                }
                else if (isNaN(x)) {
                    alert("Systolic Pressure value must be filld with numbers");
                }

                else if (isNaN(y)) {
                    alert("Diastolic Pressure value must be filled with numbers");
                }
            }
        </script>
    </head>
    <body>
    
     
    
       
        
    <center><h2>Report Details</h2></center>
    <form name="form1" style="text-align:center" action="graph_inputs2.php"  onsubmit="return myFunction()" method="post">

        <p>Enter Your ID here:</p>
        <input type="text" name="id"></input>

        <p>Random Blood Sugar:</p>
        <select name="random_blood">
            <option selected="selected">Not Calculating Now</option>
            <option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option>
            <option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option>
            <option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option>
            <option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option>
            <option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option>
            <option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option>
            <option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option>
            <option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option>
            <option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option>
            <option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option>
            <option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option>
            <option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option>
            <option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option>
            <option value="102">102</option><option value="53">103</option><option value="53">104</option><option value="53">105</option>
            <option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option>
            <option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option>
            <option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option>
            <option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option>
            <option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option>
            <option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option>
            <option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option>
            <option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option>
            <option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option>
            <option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option>
            <option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option>
            <option value="150">150</option><option value="151">151</option><option value="152">152</option><option value="153">153</option>
            <option value="154">154</option><option value="155">155</option><option value="156">156</option><option value="157">157</option>
            <option value="158">158</option><option value="159">159</option><option value="160">160</option><option value="161">161</option>
            <option value="162">162</option><option value="163">163</option><option value="164">164</option><option value="165">165</option>
            <option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option>
            <option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option>
            <option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option>
            <option value="178">178</option><option value="179">179</option><option value="180">180</option><option value="181">181</option>
            <option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option>
            <option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option>
            <option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option>
            <option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option>
            <option value="199">199</option><option value="200">200</option><option value="201">201</option>
            <option value="202">202</option><option value="203">203</option><option value="204">204</option><option value="205">205</option>
            <option value="206">206</option><option value="207">207</option><option value="208">208</option><option value="209">209</option>
            <option value="210">210</option><option value="210">210</option><option value="211">211</option><option value="212">212</option><option value="213">213</option>
            <option value="214">214</option><option value="215">215</option><option value="216">216</option><option value="217">217</option>
            <option value="218">219</option><option value="220">220</option><option value="221">221</option>
            <option value="222">222</option><option value="223">223</option><option value="224">224</option><option value="225">225</option>
            <option value="226">226</option><option value="227">227</option><option value="228">228</option><option value="229">229</option>
            <option value="230">230</option><option value="231">231</option><option value="232">232</option><option value="233">233</option><option value="234">234</option>
            <option value="235">235</option><option value="236">236</option><option value="237">237</option><option value="238">238</option>
            <option value="239">239</option><option value="240">240</option></option><option value="241">241</option><option value="242">242</option><option value="243">243</option><option value="244">244</option>
            <option value="245">245</option><option value="246">246</option><option value="247">247</option><option value="248">248</option>
            <option value="249">249</option><option value="250">250</option>
        </select><br><br>


        <p>Fasting Blood Sugar:</p>
        <select name="fasting_blood" >
            <option selected="selected">Not Calculating Now</option>
            <option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option>
            <option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option>
            <option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option>
            <option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option>
            <option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option>
            <option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option>
            <option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option>
            <option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option>
            <option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option>
            <option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option>
            <option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option>
            <option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option>
            <option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option>
            <option value="102">102</option><option value="53">103</option><option value="53">104</option><option value="53">105</option>
            <option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option>
            <option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option>
            <option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option>
            <option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option>
            <option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option>
            <option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option>
            <option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option>
            <option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option>
            <option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option>
            <option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option>
            <option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option>
            <option value="150">150</option><option value="151">151</option><option value="152">152</option><option value="153">153</option>
            <option value="154">154</option><option value="155">155</option><option value="156">156</option><option value="157">157</option>
            <option value="158">158</option><option value="159">159</option><option value="160">160</option><option value="161">161</option>
            <option value="162">162</option><option value="163">163</option><option value="164">164</option><option value="165">165</option>
            <option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option>
            <option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option>
            <option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option>
            <option value="178">178</option><option value="179">179</option><option value="180">180</option><option value="181">181</option>
            <option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option>
            <option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option>
            <option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option>
            <option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option>
            <option value="199">199</option><option value="200">200</option><option value="201">201</option>
            <option value="202">202</option><option value="203">203</option><option value="204">204</option><option value="205">205</option>
            <option value="206">206</option><option value="207">207</option><option value="208">208</option><option value="209">209</option>
            <option value="210">210</option><option value="210">210</option><option value="211">211</option><option value="212">212</option><option value="213">213</option>
            <option value="214">214</option><option value="215">215</option><option value="216">216</option><option value="217">217</option>
            <option value="218">219</option><option value="220">220</option><option value="221">221</option>
            <option value="222">222</option><option value="223">223</option><option value="224">224</option><option value="225">225</option>
            <option value="226">226</option><option value="227">227</option><option value="228">228</option><option value="229">229</option>
            <option value="230">230</option><option value="231">231</option><option value="232">232</option><option value="233">233</option><option value="234">234</option>
            <option value="235">235</option><option value="236">236</option><option value="237">237</option><option value="238">238</option>
            <option value="239">239</option><option value="240">240</option></option><option value="241">241</option><option value="242">242</option><option value="243">243</option><option value="244">244</option>
            <option value="245">245</option><option value="246">246</option><option value="247">247</option><option value="248">248</option>
            <option value="249">249</option><option value="250">250</option>
        </select><br><br>

        <p>Systolic Pressure(Top number)/Diastolic Pressure(Bottom number):</p>
        <input type="text" maxlength="3" onkeypress="return numeralsOnly(event)" name="systolic" size="5"></input>
        /
        <input type="text" maxlength="3" onkeypress="return numeralsOnly(event)" name="diastolic" size="5"></input>
        (mm Hg)
        <br><br>
        <input type="submit" name="submit" value="Enter" >



        <br><br>		
    </form>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "momprov";

    if (isset($_POST['submit'])) {

        $connection = mysql_connect($host, $user, $pass) or die("unable to connect");

        mysql_select_db($db) or die("unable to select");

        $query = "INSERT INTO graph (id,random_blood,fasting_blood,pressure_value1,pressure_value2,date) VALUES ('$_POST[id]','$_POST[random_blood]','$_POST[fasting_blood]','$_POST[systolic]','$_POST[diastolic]',CURRENT_TIMESTAMP)";

        $result = mysql_query($query, $connection) or die("error in query: $query." . mysql_error());

        mysql_close($connection);
    }
    ?>

</body>

<head>
    <script>
          function showReport(str) {
              if (str == "") {
                  document.getElementById("txtHint").innerHTML = "";
                  return;
              } else {
                  if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp = new XMLHttpRequest();
                  } else {
                      // code for IE6, IE5
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange = function() {
                      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                          document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                      }
                  }
    //        xmlhttp.open("GET","showReport.php?q="+str,true);
    //        xmlhttp.send();
                  xmlhttp.open("GET", "showReport2.php?q=" + str, true);
                  xmlhttp.send();

              }
          }
    </script>
</head>
<body>
    
    
    <form style="text-align:center" action="showReport2.php" method="post">
        <h3>Report Details Analysing Graph</h3>
        <p>If you need to see your final report details graphically you can see it from here...</p>
        <br>

        <p>Enter Your ID here:</p>
        <input type="text" name="id1" align=center></input><br><br>
        <select name="report" onchange="showReport(this.value)">
            <option value="">Select type you need:</option>
            <option value="random_blood">Random Blood</option>
            <option value="fasting_blood">Fasting Blood</option>
            <option value="pressure_value1">Systolic Pressure</option>
            <option value="pressure_value2">Diastolic Pressure</option>
        </select></form><br>
<center><div id="txtHint"><b>Your report details will be graphed here...</b></div></center>

</body>
</html>
