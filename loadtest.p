# output as png image
set terminal png

# save file to "benchmark.png"
set output "benchmark.png"

# graph title
set title "ab -n 10000 -c 100"

#nicer aspect ratio for image size
set size 1,0.7

# y-axis grid
set grid y

#x-axis label
set xlabel "request"

#y-axis label
set ylabel "response time (ms)"

#plot data from "out.data" using column 9 with smooth sbezier lines
plot "monolitik.data" using 9 smooth sbezier with lines title "monolitik", \
     "layanan-mikro.data" using 9 smooth sbezier with lines title "layanan mikro" 