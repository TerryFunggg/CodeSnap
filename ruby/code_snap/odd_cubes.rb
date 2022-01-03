# Find the sum of odd cubes list

result = (1..20).select do |num|
  num % 2 == 1
end.map do |odd|
  odd**3
end.reduce(0, :+)

puts result
