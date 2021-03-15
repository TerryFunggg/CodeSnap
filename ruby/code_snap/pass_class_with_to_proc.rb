class Greeter
  def self.to_proc
    lambda {|name| puts "Hi,#{name}"}
  end
end

["Tom","Peter"].each &Greeter
