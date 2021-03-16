# String Class already created in ruby
# But we can open a class or module and 
# add some new feature to redeclare the class
# This technique call "Monkey patch" or "open class"
class String
  def say_hello
    puts "Hello #{self}!"
  end
end

# Now, all the string object can call
# new declare method
puts "Terry".say_hello #=> "Hello Terry"
